<?php
require_once "./mvc/patterns/database/DatabaseInstance.php";
require_once "./mvc/patterns/sqlQuery/SQLQueryBuilder.php";

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
        $sqlBuilder = new SQLQueryBuilder();
        $query = $sqlBuilder
                ->insert("orders", ['id_customer', 'total', 'notes', 'time'], [$id_customer, $total, "'$note'", "'$time'"])
                ->getSQL();

        $result = $this->db->Insert($query);
        return $result;
    }
}
?>