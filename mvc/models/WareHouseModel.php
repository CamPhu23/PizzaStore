<?php
require_once "./mvc/patterns/database/DatabaseInstance.php";

class WareHouselModel {
    protected $db;
    private static $unique;

    private function __construct() {
        $this->db = DatabaseInstance::getDatabaseInstance();
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

    function updateQuantity($data) {

        $query = "INSERT INTO goods_warehouse (id,quantity) VALUES ";

        $string = "";
        for ($i = 0; $i < count($data) - 1; $i++) {
            $row = $data[$i];
            $string .= "(". $row["id"] . "," . $row["quantity"] . "),";
        }
        $string .= "(". $row["id"] . "," . $row["quantity"] . ")";

        $query .= $string . " ON DUPLICATE KEY UPDATE quantity=VALUES(quantity)";

        return $this->db->Update($query);
    }

    function updateQuantityByIdProduct($id_product, $quantity_order) {
        return $this->db->Update("UPDATE goods_warehouse SET quantity = quantity - $quantity_order WHERE id_product = '$id_product'");
    }
}
?>