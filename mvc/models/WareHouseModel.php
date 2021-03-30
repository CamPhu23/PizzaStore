<?php
    require_once "./mvc/patterns/database/DatabaseInstance.php";

    class WareHouselModel {
        protected $db;
        private static $unique;

        private function __construct() {
            $this->db = DatabaseInstance::getDatabaseInstance();
            $this->db->CreateConnection();
        }

        public static function getInstance() {
            if (Self::$unique == null) {
                Self::$unique = new WareHouselModel();
            }
            return Self::$unique;
        }

        function getGoods() {
            $this->db->SetCommand("SELECT * FROM `goods_warehouse`");
            $data = $this->db->Excute();

            if ($data == null) {
                return false;
            }

            return $data;
        }
    }
?>