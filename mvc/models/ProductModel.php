<?php
require_once "./mvc/patterns/database/DatabaseInstance.php";

class ProductModel {
    protected $db;
    private static $unique;

    private function __construct() {
        $this->db = DatabaseInstance::getDatabaseInstance();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new ProductModel();
        }
        return Self::$unique;
    }

    function getProductPizza() {
        $data = $this->db->Select("SELECT name, description, price, id FROM `products` WHERE id LIKE 'pizza%'");
        if($data == null) {
            return false;
        }

        return $data;
    }

    function getProductWater() {
        $data = $this->db->Select("SELECT name, description, price, id FROM `products` WHERE id LIKE 'drink%'");

        if($data == null) {
            return false;
        }

        return $data;
    }


    function getProductId() {
        $data = $this->db->Select("SELECT id FROM `products`");

        if ($data == null) {
            return false;
        }

        return $data;
    }
}
?>