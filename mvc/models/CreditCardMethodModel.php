<?php

require_once "./mvc/patterns/database/DatabaseInstance.php";

class CreditCardMethodModel {
    protected $db;
    private static $unique;

    private function __construct() {
        $this->db = DatabaseInstance::getDatabaseInstance();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new CreditCardMethodModel();
        }
        return Self::$unique;
    }

    public function insertCreditCardMethod($id_order, $id_credit_card) {
        $id = $this->db->Insert("INSERT INTO credit_card_method VALUES ('', 2, $id_order, $id_credit_card)");

        return $id;
    }
}

?>