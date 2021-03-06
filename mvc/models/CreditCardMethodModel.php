<?php

require_once "./mvc/patterns/Database/DatabaseInstance.php";
require_once "./mvc/patterns/SqlQuery/SQLQueryBuilder.php";

class CreditCardMethodModel {
    protected $db;
    private $sqlBuilder;
    private static $unique;

    private function __construct() {
        $this->db = DatabaseInstance::getDatabaseInstance();
        $this->sqlBuilder = new SQLQueryBuilder();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new CreditCardMethodModel();
        }
        return Self::$unique;
    }

    public function insertCreditCardMethod($id_order, $id_credit_card) {
        $query = $this->sqlBuilder
                ->insert("credit_card_method", ["id_trans_method", "id_order", "id_credit_card"], [2, $id_order, $id_credit_card])
                ->getSQL();

        $id = $this->db->Insert($query);

        return $id;
    }
}

?>