<?php

require_once "./mvc/core/View.php";

class Login {
    protected $view;

    function __construct() {
        $this->view = View::getInstance();
    }

    function Index() {
        $this->view->render("LoginView", []);
    }

    function SignInProcess() {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // if ($username === "admin" && $password === "123123123") {
        //     header("Location: ../Home/Index");
        //     exit();
        // }
        echo $username;
        echo $password;
    }
}

?>