<?php
require_once "./mvc/patterns/database/DatabaseInstance.php";

class WareHouselModel {
    protected $db;
    private static $unique;
    private $sqlBuilder;

    private function __construct() {
        $this->db = DatabaseInstance::getDatabaseInstance();
        $this->sqlBuilder = new SQLQueryBuilder();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new WareHouselModel();
        }
        return Self::$unique;
    }

    function getGoods() {
        $query = $this->sqlBuilder
                ->select('goods_warehouse', [])
                ->getSQL();

        $data = $this->db->Select($query);

        if ($data == null) {
            return false;
        }

        return $data;
    }

    function getGoodIdAndQuantity() {
        $query = $this->sqlBuilder
                ->select(goods_warehouse, [id, quantity])
                ->getSQL();

        $data = $this->db->Select($query);

        if ($data == null) {
            return false;
        }

        return $data;
    }

    function updateQuantity($data) {
        $len = count($data);
        for ($i = 0; $i < $len; $i++) {
            $row = $data[$i];
            
            $query = $this->sqlBuilder
                    ->update(goods_warehouse)
                    ->set(quantity, $row["quantity"])
                    ->where(id, $row["id"])
                    ->getSQL();

            if (!$this->db->Update($query)) {
                return false;
            }
        }

        return true;
    }

    function updateQuantityByIdProduct($id_product, $quantity_order) {
        $query = $this->sqlBuilder
            ->update(goods_warehouse)
            ->set(quantity, quantity - $quantity_order)
            ->where(id_product, "'$id_product'")
            ->getSQL();

        if (!$this->db->Update($query)) {
            return false;
        }

        return true;
    }
}
?>