<?php
require_once './mvc/models/CreditCardMethodModel.php';

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
        $result = $creditCardModel->insertCreditCardMethod($id_order, (int)$this->id);
        
        header('Content-Type: application/json; charset=utf-8');
        if ($result === FALSE) {
            echo json_encode(array('code' => 0, 'message' => 'Đã xảy ra lỗi tại OrderPayByCreditCard => Pay'));
        } else {
            echo json_encode(array('code' => 2, 'message' => 'Đã thanh toán thành công'));
        }

    }
}

?>
