<?php
require_once "./mvc/patterns/sqlQuery/SQLQueryBuilder.php";
require_once "./mvc/patterns/database/DatabaseInstance.php";

class OrderCompleteModel {
    protected $db;
    private static $unique;
    private $sqlBuilder;

    private function __construct() {
        $this->db = DatabaseInstance::getDatabaseInstance();
        $this->sqlBuilder = new SQLQueryBuilder();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new OrderCompleteModel();
        }
        return Self::$unique;
    }

    function OrderCompleteStatus($id) {
        $query = $this->sqlBuilder->select("orders", ["id"])->where("id", "$id")->getSQL();
        $id_order = $this->db->Select($query);
        if($id_order == NULL) {
            echo '<script>alert("Mã order sai")
            window.location ="OrderComplete";</script>';
            return false;
        }
        
        $query2 = $this->sqlBuilder
                ->Update("orders")
                ->Set("status", 1)
                ->Where("id", "$id")
                ->getSQL();
        $this->db->Update($query2);
        echo "Status order changed Complete!!!";
        header( "refresh:2; url=OrderComplete");
        return;
    }
}
?>