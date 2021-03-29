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

<<<<<<< HEAD
    function Index() {
        if (!isset($_SESSION["permission"])) {
            header('../Account/LogIn');
            exit();
        }
=======
    //sua ten HomeView lai thanh CreateNewOrderView
    //sua function CreateNewOrder
    function CreateNewOrder() {
>>>>>>> commit pages
        $this->view->render("HomeView", []);
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
        $this->view->render('OrderCompleteView', []);
    }

    function OrderCompleteProcess() {
        $order_id = $_POST["orderId"];

        echo "from OrderCompleteProcess: " . $order_id;
    }

}

?>