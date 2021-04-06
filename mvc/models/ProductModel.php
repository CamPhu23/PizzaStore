<?php
require_once "./mvc/patterns/SqlQuery/SQLQueryBuilder.php";
require_once "./mvc/patterns/Database/DatabaseInstance.php";

class ProductModel {
    protected $db;
    private static $unique;
    private $sqlBuilder;

    private function __construct() {
        $this->db = DatabaseInstance::getDatabaseInstance();
        $this->sqlBuilder = new SQLQueryBuilder();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new ProductModel();
        }
        return Self::$unique;
    }

    function getProductPizza() {
        $query = $this->sqlBuilder
            ->select("products", ["name", "description", "price", "id"])
            ->where("id","'pizza%'", "LIKE")
            ->getSQL();

        $data = $this->db->Select($query);

        if($data == null) {
            return false;
        }

        return $data;
    }

    function getProductWater() {
        $query = $this->sqlBuilder
            ->select("products", ["name", "description", "price", "id"])
            ->where("id","'drink%'", "LIKE")
            ->getSQL();

        $data = $this->db->Select($query);

        if($data == null) {
            return false;
        }

        return $data;
    }

    function getProductNameById($id) {
        $query = $this->sqlBuilder
            ->select("products", ["name"])
            ->where("id","'$id'")
            ->getSQL();

        $data = $this->db->Select($query);

        if($data == null) {
            return false;
        }

        return $data;
    }


    function getProductId() {
        $query = $this->sqlBuilder
            ->select("products", ["id"])
            ->getSQL();

        $data = $this->db->Select($query);

        if ($data == null) {
            return false;
        }

        return $data;
    }

    function getProductById($id) {
        $query = $this->sqlBuilder
                ->select("products", [])
                ->where("id", "'$id'")
                ->getSQL();

        $data = $this->db->Select($query);

        if ($data == null) {
            return false;
        }
        return $data;
    }
}
?>