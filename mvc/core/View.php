<?php

class View {

    private static $instance;
    private $view;

    private function __construct() {
        $instance = null;
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new View();
        }

        return self::$instance;
    }

    public function render($view, $data = []) {
        $root = $this->getDir();
        $this->view = "./mvc/views/" . $view . ".php";

        require_once $this->view;
    }

    private function getDir() {
        $root = "";

        if (isset($_GET["url"])) {
            $url = explode("/", filter_var(trim($_GET["url"], "/")));
            $level = count($url);

            while ($level > 1) {
                $root = $root . "../";
                $level--;
            }
        }

        return $root;
    }
}

?>