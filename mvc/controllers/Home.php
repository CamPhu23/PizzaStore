<?php

require_once "./mvc/core/View.php";
require_once "./mvc/models/WareHouseModel.php";
require_once "./mvc/models/UserModel.php";
require_once "./mvc/patterns/database/DatabaseInstance.php";
require_once "./mvc/patterns/database/Database.php";
require_once './mvc/patterns/services/IProtectionProxy.php';

require_once "./mvc/patterns/SortMaterial/SortType.php";
require_once "./mvc/patterns/SortMaterial/SortByCharacter.php";
require_once "./mvc/patterns/SortMaterial/SortByMaterialQuantityDescending.php";
require_once "./mvc/patterns/SortMaterial/SortByMaterialQuantityAscending.php";


class Home implements IProtectionProxy {
    protected $view;
//    protected $model;

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

        if (isset($_POST["note"])) {
            $note = $_POST["note"];
            echo $note . "note\n";
        }

        if (isset($_POST["credit_card_id"])) {
            $credit_card_id = $_POST["credit_card_id"];
            echo $credit_card_id . "id\n";
        } else {
            $cash = $_POST["cash"];
            $change = $_POST["change"];

            echo $cash . "cash\n";
            echo $change . "change\n";
        }

        echo $phone_number . "phone\n";
        echo $total_price . "total\n";
    }

    function testDB() {
        $db = DatabaseInstance::getDatabaseInstance();
        $db->CreateConnection();
        $db->SetCommand("SELECT * FROM loyal_level");
        $data = $db->Excute();

//        su dung bang cach $data[0]["level"]

        print_r($data);
        die();
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

    function CreateExcelReport() {
        $filename = $_POST["filename"];
        $type = $_POST["file_type"];

        echo "From CreateExcelReport: export file with name " . $filename . " and type " . $type;
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

        $sorter = new SortByCharacter();
        $result = $sorter->excuteSort($result);
        echo json_encode($result);
    }

    function APIStockManagement_AsQuantity() {
        header('Content-Type: application/json; charset=utf-8');
        $modal = WareHouselModel::getInstance();
        $result = $modal->getGoods();

        $sorter = new SortByMaterialQuantityAscending();
        $result = $sorter->excuteSort($result);
        echo json_encode($result);
    }

    function APIStockManagement_DesQuantity() {
        header('Content-Type: application/json; charset=utf-8');
        $modal = WareHouselModel::getInstance();
        $result = $modal->getGoods();

        $sorter = new SortByMaterialQuantityDescending();
        $result = $sorter->excuteSort($result);
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