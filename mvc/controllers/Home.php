<?php

require_once "./mvc/core/View.php";
require_once "./mvc/patterns/database/DatabaseFactory.php";
require_once "./mvc/patterns/database/MysqlDatabase.php";
require_once "./mvc/patterns/database/MssqlDatabase.php";

class Home {
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

    function testDB() {
        $db = MysqlDatabase::getInstance("localhost", "root", "", "pizza_store");
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

    function OrderCompleteProcess() {
        $order_id = $_POST["orderId"];

        echo "from OrderCompleteProcess: " . $order_id;
    }

    function EmployerManagement() {
        $this->view->render('ManagementView', ["Target" => "EmployerManagement"]);
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
        $this->view->render('ManagementView', ["Target" => "StockManagement"]);
    }
}

?>