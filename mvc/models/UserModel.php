<?php
    require_once "./mvc/patterns/database/MysqlDatabase.php";

    class UserModel {
        protected $db;
        private static $unique;

        private function __construct() {
            $this->db = MysqlDatabase::getInstance("localhost", "root", "", "pizza_store");
            $this->db->CreateConnection();
        }

        public function getInstance() {
            if (Self::$unique == null) {
                Self::$unique = new UserModel();
            }
            return Self::$unique;
        }

        function getUser($username, $pass) {
            $this->db->SetCommand("SELECT id_permission, firstName, lastName FROM `account` WHERE userName='$username' AND password='$pass'");
            $data = $this->db->Excute();

            if ($data == null) {
                return false;
            }

            return $data;
        }
    }
?>