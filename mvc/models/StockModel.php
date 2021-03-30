<?php

require_once "./mvc/patterns/database/DatabaseInstance.php.php";

class StockModel {
    protected $db;
    private static $instance;

    private function __construct() {
        $this->db = DatabaseInstance::getDatabaseInstance();
        $this->db->CreateConnection();
    }

    public function getInstance() {
        if (Self::$instance == null) {
            Self::$instance = new StockModel();
        }

        return Self::$instance;
    }

    function getStockData($username, $pass) {
        $this->db->SetCommand("SELECT * FROM `goods_warehouse`");
        $data = $this->db->Excute();

        if ($data == null) {
            return false;
        }

        return $data;
    }
}

?>
