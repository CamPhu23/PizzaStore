<?php
require_once "./mvc/patterns/database/DatabaseInstance.php";

class PrepareMaterialModal {
    protected $db;
    private static $unique;

    private function __construct() {
        $this->db = new DatabaseInstance();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new PrepareMaterialModal();
        }
        return Self::$unique;
    }

    function getMaterialIdAndQuantityByIdProduct_Quantity($id_product, $quantity) {
        return $this->db->Select("SELECT id, quantity * $quantity as quantity FROM `prepare_material` WHERE id_product = '$id_product'");
    }

}
?>