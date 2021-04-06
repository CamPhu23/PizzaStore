<?php
require_once './mvc/models/CreditCardMethodModel.php';
require_once './mvc/patterns/Bill/BillBuilder.php';
require_once './mvc/models/UserModel.php';
require_once './mvc/patterns/Orders/Order.php';

class OrderPayByCreditCard extends Order {
    private $id;
    public function __construct($phone_number, $total_price, $list_products, $quantity_products, $note, $credit_card_id)
    {
        $this->id = $credit_card_id;
        parent::__construct($phone_number, $total_price, $list_products, $quantity_products, $note);
    }

    public function pay($id_order)
    {
        $creditCardModel = CreditCardMethodModel::getInstance();
        $creditCardModel->insertCreditCardMethod($id_order, (int)$this->id);
    }

    public function issueInvoice($id_order)
    {
        $orderModel = OrderModel::getInstance();
        $data = $orderModel->getOrders($id_order);

        $billBuilder = new BillBuilder("Cửa hàng The Pizaa", "332 Lý Nam Đế P.10 Q.12", "0933090909");

        $bill = $billBuilder
                ->setBillId($id_order)
                ->setPaymentTime($data[0]["time"])
                ->setTotalPrice($data[0]["total"])
                ->setCustomerPhone($this->phone)
                ->setPaymentMothod("Thẻ tín dụng")
                ->setCustomerCardBankId($this->id)
                ->setTotalPrice($this->total)
                ->setItems($this->products)
                ->setQuantity($this->quantity);

        $customerModel = CustomerModel::getInstance();
        $customerInfo = $customerModel->getCustomerByPhone($data[0]["phone"]);

        $productModel = ProductModel::getInstance();
        for ($i = 0; $i < count($this->products); $i++) {
            $product = $productModel->getProductById($this->products[$i]);
            $cost[] = $product[0]["price"];
            $name[] = $product[0]["name"];
        }
        $bill = $bill->setItemCost($cost);
        $bill = $bill->setItemsName($name);

        $bill = $bill->setCustomerName($customerInfo[0]["fullname"]);

        $userModel = UserModel::getInstance();
        $userName = $userModel->getUserNameById($_SESSION["idUser"]);
        $bill = $bill->setSellerName($userName[0]["lastName"] . " " . $userName[0]["firstName"]);

        $array = json_decode(json_encode($bill), true);
        
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(array('code' => 2, 'message' => 'Đã thanh toán thành công', 'data' => $array));
        exit();
    }
}

?>
