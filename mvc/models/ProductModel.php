<?php
require_once "./mvc/patterns/database/DatabaseInstance.php";

class ProductModel {
    protected $db;
    private static $unique;

    private function __construct() {
        $this->db = new DatabaseInstance();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new ProductModel();
        }
        return Self::$unique;
    }

    function getProduct() {
        $data = $this->db->Select("SELECT name, description, price, id FROM `products` WHERE id NOT LIKE 'NN%'");
        if($data == null) {
            return false;
        }

        return $data;
    }

    function getProduct_water() {
        $data = $this->db->Select("SELECT name, description, price, id FROM `products` WHERE id LIKE 'NN%'");

        if($data == null) {
            return false;
        }

        return $data;
    }
}
?>