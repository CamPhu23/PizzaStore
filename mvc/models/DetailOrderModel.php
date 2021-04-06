<?php

require_once "./mvc/patterns/Database/DatabaseInstance.php";
require_once "./mvc/patterns/SqlQuery/SQLQueryBuilder.php";

class DetailOrderModel {
    protected $db;
    private $sqlBuilder;
    private static $unique;

    private function __construct() {
        $this->db = DatabaseInstance::getDatabaseInstance();
        $this->sqlBuilder = new SQLQueryBuilder();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new DetailOrderModel();
        }
        return Self::$unique;
    }

    function insertDetailOrder($id_order, $id_product, $quantity) {
        $query = $this->sqlBuilder
                ->insert("detail_order", [], [$id_order, "'$id_product'", $quantity])
                ->getSQL();

        $result = $this->db->Insert($query);
        return $result;
    }
}

?>