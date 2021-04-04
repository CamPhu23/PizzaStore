<?php
require_once "./mvc/patterns/database/DatabaseInstance.php";
require_once "./mvc/patterns/sqlQuery/SQLQueryBuilder.php";

class CustomerModel {
    protected $db;
    private static $unique;

    private function __construct() {
        $this->db = DatabaseInstance::getDatabaseInstance();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new CustomerModel();
        }
        return Self::$unique;
    }

    function insertCustomer($fullname, $phone, $email, $allow) {
        $result = $this->db->Insert("INSERT INTO `customer`(`id`, `fullname`, `phone`, `email`, `allow`) VALUES (NULL, '$fullname', '$phone', '$email', $allow)");
        return $result;
    }

    function deleteCustomer($id) {
        $sqlBuilder = new SQLQueryBuilder();
        $query = $sqlBuilder
                ->delete("customer")
                ->where("id", 2)
                ->getSQL();

        $result = $this->db->Delete($query);
        return $result;
    }

    function getCustomerById($id) {
        $data = $this->db->Select("SELECT `id`, `fullname`, `phone`, `email`, `allow` FROM `customer` WHERE `id` = $id");

        if ($data == null) {
            return false;
        }

        return $data;
    }

    function getCustomerAllowReceive() {
        $data = $this->db->Select("SELECT * FROM `customer` WHERE `allow` = 1");

        if ($data == null) {
            return false;
        }

        return $data;
    }
}
?>