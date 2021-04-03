<?php

require_once "./mvc/patterns/database/DatabaseInstance.php";

class CashMethodModel {
    protected $db;
    private static $unique;

    private function __construct() {
        $this->db = DatabaseInstance::getDatabaseInstance();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new CashMethodModel();
        }
        return Self::$unique;
    }

    public function insertCashMethod($id_order, $cash) {
        $id = $this->db->Insert("INSERT INTO cash_method VALUES ('', 1, $id_order, $cash)");

        return $id;
    }
}

?>