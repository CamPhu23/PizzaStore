<?php
require_once "./mvc/patterns/sqlQuery/SQLQueryBuilder.php";
require_once "./mvc/patterns/Database/DatabaseInstance.php";

class PrepareMaterialModal {
    protected $db;
    private static $unique;
    private $sqlBuilder;

    private function __construct() {
        $this->db = DatabaseInstance::getDatabaseInstance();
        $this->sqlBuilder = new SQLQueryBuilder();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new PrepareMaterialModal();
        }
        return Self::$unique;
    }

    function getMaterialNameAndQuantityByIdProduct_Quantity($id_product, $quantity) {
        $query = $this->sqlBuilder
                ->select("prepare_material", ["name", "quantity * $quantity as quantity"])
                ->where("id_product","'$id_product'")
                ->getSQL();

        $data = $this->db->Select($query);

        if($data == null) {
            return false;
        }

        return $data;
    }

}
?>