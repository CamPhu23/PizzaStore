<?php

require_once "./mvc/core/View.php";

class Account {
    protected $view;

    function __construct() {
        $this->view = View::getInstance();
    }

    function LogIn() {
        $this->view->render("LoginView", []);
    }

    function SignInProcess() {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($username === "admin" && $password === "123456") {
            $_SESSION["permission"] = 1;

            header("Location: ../Home/Index");
            exit();
        } else if ($username === "NewOrder" && $password === "123456") {
            $_SESSION["permission"] = 2;

            header("Location: ../Home/Index");
            exit();
        } else if ($username === "ProcessOrder" && $password === "123456") {
            $_SESSION["permission"] = 3;

            header("Location: ../Home/Index");
            exit();
        } else if ($username === "StockManagement" && $password === "123456") {
            $_SESSION["permission"] = 4;

            header("Location: ../Home/Index");
            exit();
        } else {
            echo 'Dang nhap that bai';
            exit();
        }
    }

    function Logout() {
        session_unset();
        session_destroy();

        header("Location: ../Account/LogIn");
        exit();
    }
}

?>