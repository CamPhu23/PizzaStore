<?php
require_once "./mvc/patterns/database/DatabaseInstance.php";

class UserModel {
    protected $db;
    private static $unique;

    private function __construct() {
        $this->db = DatabaseInstance::getDatabaseInstance();
        $this->db->CreateConnection();
    }

    public static function getInstance() {
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

//    function getEmployers() {
//        $this->db->SetCommand("SELECT * FROM")
//        }
}
?>