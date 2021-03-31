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
}
?>