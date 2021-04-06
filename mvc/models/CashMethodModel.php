<?php

require_once "./mvc/patterns/Database/DatabaseInstance.php";
require_once "./mvc/patterns/SqlQuery/SQLQueryBuilder.php";

class CashMethodModel {
    protected $db;
    private $sqlBuilder;
    private static $unique;

    private function __construct() {
        $this->db = DatabaseInstance::getDatabaseInstance();
        $this->sqlBuilder = new SQLQueryBuilder();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new CashMethodModel();
        }
        return Self::$unique;
    }

    public function insertCashMethod($id_order, $cash) {
        $query = $this->sqlBuilder
                ->insert("cash_method", ["id_trans_method", "id_order", "receive_money"], [1, $id_order, $cash])
                ->getSQL();
                
        $id = $this->db->Insert($query);
        return $id;
    }
}

?>