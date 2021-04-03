<?php
require_once "./mvc/patterns/database/DatabaseInstance.php";

class OrderModel {
    protected $db;
    private static $unique;

    private function __construct() {
        $this->db = DatabaseInstance::getDatabaseInstance();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new OrderModel();
        }
        return Self::$unique;
    }

    function InsertOrder($id_customer, $total, $note, $time) {
        $result = $this->db->Insert("INSERT INTO `orders`(`id`, `id_customer`, `total`, `notes`, `time`) VALUES (NULL, $id_customer, $total, '$note', '$time')");
        return $result;
    }
}
?>