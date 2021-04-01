<?php
require_once "./mvc/patterns/database/DatabaseInstance.php";

class WareHouselModel {
    protected $db;
    private static $unique;

    private function __construct() {
        $this->db = new DatabaseInstance();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new WareHouselModel();
        }
        return Self::$unique;
    }

    function getGoods() {
        $data = $this->db->Select("SELECT * FROM `goods_warehouse`");

        if ($data == null) {
            return false;
        }

        return $data;
    }

    function getGoodIdAndQuantity() {
        $data = $this->db->Select("SELECT id, quantity FROM `goods_warehouse`");

        if ($data == null) {
            return false;
        }

        return $data;
    }

    function updateQuantityByIdMaterialByIdMaterial($id_material, $quantity_order) {
        return $this->db->Update("UPDATE goods_warehouse SET quantity = quantity - $quantity_order WHERE id_material = $id_material");
    }

    function updateQuantityByIdProduct($id_product, $quantity_order) {
        return $this->db->Update("UPDATE goods_warehouse SET quantity = quantity - $quantity_order WHERE id_product = '$id_product'");
    }
}
?>