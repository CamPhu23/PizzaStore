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

        $sqlBuilder = new SQLQueryBuilder();

        $string = "";
        $len = count($data);
        for ($i = 0; $i < $len; $i++) {
            $row = $data[$i];
            
            $query = $sqlBuilder
                    ->update("goods_warehouse")
                    ->set("quantity", $row["quantity"])
                    ->where("id", $row["id"])
                    ->getSQL();

            if (!$this->db->Update($query)) {
                return false;
            }
        }

        return true;
    }

    function updateQuantityByIdProduct($id_product, $quantity_order) {
        return $this->db->Update("UPDATE goods_warehouse SET quantity = quantity - $quantity_order WHERE id_product = '$id_product'");
    }
}
?>