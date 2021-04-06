<?php
require_once "./mvc/core/View.php";
require_once './mvc/models/UserModel.php';

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

        $modal = UserModel::getInstance();

        $result = $modal->getUser($username, $password);

        if (!empty($result)) {
            $permission = $result[0]["id_permission"];
            $_SESSION['permission'] = $permission;
            $_SESSION['idUser'] = $result[0]["id"];
             
            if ($permission == 1) {
                header("Location: ../Home/EmployerManagement");
            } else if ($permission == 2) {
                header("Location: ../Home/CreateNewOrder");
            } else if ($permission == 3) {
                header("Location: ../Home/OrderComplete");
            }

            exit();
        }
        
        header("Location: ../Account/Login");
        exit();
    }

    function Logout() {
        session_unset();
        session_destroy();

        header("Location: ../Account/LogIn");
        exit();
    }
}

?>