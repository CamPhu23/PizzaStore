<?php

require_once "./mvc/patterns/database/DatabaseInstance.php";
require_once "./mvc/patterns/sqlQuery/SQLQueryBuilder.php";

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
                ->insert("credit_card_method", [], ['', 2, $id_order, $id_credit_card])
                ->getSQL();

        $id = $this->db->Insert($query);

        return $id;
    }
}

?>