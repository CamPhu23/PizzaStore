<?php
require_once "./mvc/patterns/Database/DatabaseInstance.php";
require_once "./mvc/patterns/SqlQuery/SQLQueryBuilder.php";

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
                ->insert("orders", ['phone', 'total', 'notes', 'time'], [$id_customer, $total, "'$note'", "'$time'"])
                ->getSQL();

        $result = $this->db->Insert($query);
        return $result;
    }

    public function getOrderWithCash() {
        $query = $this->sqlBuilder
                ->select("orders", ["orders.id", "orders.phone", "orders.total", "orders.notes", "orders.time", "orders.status", "transaction_method.method"])
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
            ->select("orders", ["orders.id", "orders.phone", "orders.total", "orders.notes", "orders.time", "orders.status", "transaction_method.method"])
            ->inner_join("credit_card_method")
            ->on("credit_card_method.id_order", "orders.id")
            ->inner_join("transaction_method")
            ->on("transaction_method.id", "credit_card_method.id_trans_method")
            ->getSQL();

        $data = $this->db->Select($query);
        return $data;
    }
    
    function updateStatus($id_order) {
        $query = $this->sqlBuilder
                ->update("orders")
                ->set("status", 1)
                ->where("id", $id_order)
                ->getSQL();

        if($this->db->Update($query)) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(array('code' => 0, 'message' => 'Cập nhật trạng thái thành công'));
        }
        exit();
    }

    function getOrders($id_order) {
        $query = $this->sqlBuilder
                ->select("orders", [])
                ->where("id", $id_order)
                ->getSQL();

        $data = $this->db->Select($query);

        if($data == null) {
            return false;
        }

        return $data;
    }
}
?>