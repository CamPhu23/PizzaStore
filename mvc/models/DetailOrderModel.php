<?php

require_once "./mvc/patterns/database/DatabaseInstance.php";

class DetailOrderModel {
    protected $db;
    private static $unique;

    private function __construct() {
        $this->db = DatabaseInstance::getDatabaseInstance();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new DetailOrderModel();
        }
        return Self::$unique;
    }

    function InsertDetailOrder($id_order, $id_product, $quantity) {
        $result = $this->db->Insert("INSERT INTO `detail_order`(`id_order`, `id_product`, `quanlity`) VALUES ($id_order, '$id_product', $quantity)");
        return $result;
    }
}

?>