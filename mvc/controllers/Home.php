<?php

require_once "./mvc/core/View.php";

require_once "./mvc/models/WareHouseModel.php";
require_once "./mvc/models/UserModel.php";

require_once './mvc/patterns/services/IProtectionProxy.php';

require_once './mvc/patterns/reports/Report.php';

require_once './mvc/patterns/SortMaterial/SortedList.php';

require_once './mvc/patterns/Orders/ProcessOrder.php';

//        su dung bang cach $data[0]["level"]

class Home implements IProtectionProxy {
    protected $view;

    function __construct() {
        $this->view = View::getInstance();
    }

    function CreateNewOrder() {
        if (!isset($_SESSION["permission"])) {
            header('Location: ../Account/LogIn');
            exit();
        }
        $this->view->render("CreateNewOrderView", ["Target" => "CreateNewOrder"]);
    }

    function CreateNewOrderProcess() {
        $phone_number = $_POST["customer-phone-number"];
        $total_price = $_POST["total_price"];
        $list_products = $_POST["id_product"];
        $quantity_products = $_POST["quantity"];
        $note = $_POST["note"];
        
        $processOrder = new ProcessOrder($phone_number, $total_price, $list_products, $quantity_products, $note);

        if (isset($_POST["credit_card_id"])) {
            $credit_card_id = $_POST["credit_card_id"];

            $processOrder->setCreditCardPayMethod($credit_card_id);
        } else {
            $cash = $_POST["cash"];
            $change = $_POST["change"];

            $processOrder->setCashPayMethod($cash, $change);
        }

        $processOrder->process();
    }

    function OrderComplete() {
        $this->view->render('OrderCompleteView', ["Target" => "OrderComplete"]);
    }

    function StockInRequest() {
        $this->view->render('OrderCompleteView', ["Target" => "StockInRequest"]);
    }

    function CreateNewCustomerAccount() {
        $this->view->render('OrderCompleteView', ["Target" => "CreateNewCustomerAccount"]);
    }

    function EmployerManagement() {
        $modal = UserModel::getInstance();
        $result = $modal->getEmployers();

        $this->view->render('ManagementView', ["Target" => "EmployerManagement", "EmployerList" => $result]);
    }

    function CreateNewEmployerProcess() {
        $fullname = $_POST["fullname"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $permission = $_POST["permission"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        echo "from CreateNewEmployerProcess: " . $fullname . "-" . $phone . "-" . $email . "-" . $permission . "-" . $username . "-" . $password;
    }

    function SalesManagement() {
        $this->view->render('ManagementView', ["Target" => "SalesManagement"]);
    }

    function CreateReport() {
        $filename = $_POST["filename"];
        $type = $_POST["file_type"];

        $reporter = new Report($filename);
        $reporter->setCmd1(new ExcelReportCommand());
        $reporter->setCmd2(new WordReportCommand());
        $reporter->setCmd3(new PDFReportCommand());

        if ($type == 1) {
            $reporter->option1();
        } else if ($type == 2) {
            $reporter->option2();
        } else if ($type == 3) {
            $reporter->option3();
        }

        exit();
    }

    function StockManagement() {
        $modal = WareHouselModel::getInstance();
        $result = $modal->getGoods();

        $this->view->render('ManagementView', ["Target" => "StockManagement", "List" => $result]);
    }

    function APIStockManagement_Character() {
        header('Content-Type: application/json; charset=utf-8');
        $modal = WareHouselModel::getInstance();
        $result = $modal->getGoods();

        $sortedList = new SortedList($result);
        $sortedList->setSortStrategy(new SortByCharacter());
        $result = $sortedList->sort();
        echo json_encode($result);
    }

    function APIStockManagement_AsQuantity() {
        header('Content-Type: application/json; charset=utf-8');
        $modal = WareHouselModel::getInstance();
        $result = $modal->getGoods();

        $sortedList = new SortedList($result);
        $sortedList->setSortStrategy(new SortByMaterialQuantityAscending());
        $result = $sortedList->sort();
        echo json_encode($result);
    }

    function APIStockManagement_DesQuantity() {
        header('Content-Type: application/json; charset=utf-8');
        $modal = WareHouselModel::getInstance();
        $result = $modal->getGoods();

        $sortedList = new SortedList($result);
        $sortedList->setSortStrategy(new SortByMaterialQuantityDescending());
        $result = $sortedList->sort();
        echo json_encode($result);
    }

    function CreateNewCustomerAccountProcess() {
        $lastName = $_POST["lastName"];
        $firstName = $_POST["firstName"];
        $phoneNumber = $_POST["phoneNumber"];

        print_r("lstName:" . $lastName . "\nfrstName:" . $firstName . "\nphoneNumber:" . $phoneNumber);
        exit();
    }

    function StockInRequestProcess() {
        $goodsID = $_POST["goodsID"];
        $goodsName = $_POST["goodsName"];
        $quantity = $_POST["quantity"];

        print_r("goodsID:" . $goodsID . "\ngoodsName:" . $goodsName . "\nquantity:" . $quantity);
        exit();

    }

    function OrderCompleteProcess() {
        $orderId = $_POST["orderId"];

        print_r("orderId:" . $orderId );
        exit();
    }
}

?>