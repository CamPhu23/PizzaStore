<?php
require_once "./mvc/patterns/database/DatabaseInstance.php";
require_once "./mvc/patterns/sqlQuery/SQLQueryBuilder.php";

class OrderModel {
    protected $db;
    private $sqlBuilder;
    private static $unique;

    private function __construct() {
        $this->db = DatabaseInstance::getDatabaseInstance();
        $this->sqlBuilder = new SQLQueryBuilder();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new OrderModel();
        }
        return Self::$unique;
    }

    public function insertOrder($id_customer, $total, $note, $time) {
        $query = $this->sqlBuilder
                ->insert("orders", ['id_customer', 'total', 'notes', 'time'], [$id_customer, $total, "'$note'", "'$time'"])
                ->getSQL();

        $result = $this->db->Insert($query);
        return $result;
    }

    public function getOrderWithCash() {
        $query = $this->sqlBuilder
                ->select("orders", ["orders.id", "orders.id_customer", "orders.total", "orders.notes", "orders.time", "orders.status", "transaction_method.method"])
                ->inner_join("cash_method")
                ->on("cash_method.id_order", "orders.id")
                ->inner_join("transaction_method")
                ->on("transaction_method.id", "cash_method.id_trans_method")
                ->getSQL();

        $data = $this->db->Select($query);
        return $data;
    }

    public function getOrderWithCreditCard() {
        $query = $this->sqlBuilder
            ->select("orders", ["orders.id", "orders.id_customer", "orders.total", "orders.notes", "orders.time", "orders.status", "transaction_method.method"])
            ->inner_join("credit_card_method")
            ->on("credit_card_method.id_order", "orders.id")
            ->inner_join("transaction_method")
            ->on("transaction_method.id", "credit_card_method.id_trans_method")
            ->getSQL();

        $data = $this->db->Select($query);
        return $data;
    }
}
?>