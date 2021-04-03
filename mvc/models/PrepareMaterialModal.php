<?php
require_once "./mvc/patterns/database/DatabaseInstance.php";

class PrepareMaterialModal {
    protected $db;
    private static $unique;

    private function __construct() {
        $this->db = DatabaseInstance::getDatabaseInstance();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new PrepareMaterialModal();
        }
        return Self::$unique;
    }

    function getMaterialNameAndQuantityByIdProduct_Quantity($id_product, $quantity) {
        return $this->db->Select("SELECT name, quantity * $quantity as quantity FROM `prepare_material` WHERE id_product = '$id_product'");
    }

}
?>