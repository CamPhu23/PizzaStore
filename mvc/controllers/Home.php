<?php

require_once "./mvc/core/View.php";

class Home {
    protected $view;
//    protected $model;

    function __construct() {
        $this->view = View::getInstance();
    }

    function Index() {
        $this->view->render("HomeView", []);
    }
}

?>