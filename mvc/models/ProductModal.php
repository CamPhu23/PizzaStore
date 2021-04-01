<?php
require_once "./mvc/patterns/database/DatabaseInstance.php";

class ProductModal {
    protected $db;
    private static $unique;

    private function __construct() {
        $this->db = new DatabaseInstance();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new ProductModal();
        }
        return Self::$unique;
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