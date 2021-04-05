<?php
require_once "./mvc/patterns/database/DatabaseInstance.php";
require_once "./mvc/patterns/sqlQuery/SQLQueryBuilder.php";

class CustomerModel {
    protected $db;
    private $sqlBuilder;
    private static $unique;

    private function __construct() {
        $this->db = DatabaseInstance::getDatabaseInstance();
        $this->sqlBuilder = new SQLQueryBuilder();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new CustomerModel();
        }
        return Self::$unique;
    }

    function insertCustomer($fullname, $phone, $email, $allow) {
        $query = $this->sqlBuilder
                ->insert("customer", ['fullname', 'phone', 'email', 'allow'], ["'$fullname'", "'$phone'", "'$email'", $allow])
                ->getSQL();

        $result = $this->db->Insert($query);
        return $result;
    }

    function deleteCustomer($email) {
        $query = $this->sqlBuilder
                ->delete("customer")
                ->where("email", "'$email'")
                ->getSQL();

        $result = $this->db->Delete($query);
        return $result;
    }

    function getCustomerByEmail($email) {
        $query = $this->sqlBuilder
                ->select("customer", ["id", "fullname", "phone", "email", "allow"])
                ->where("email", "'$email'")
                ->getSQL();
                

        $data = $this->db->Select($query);

        if ($data == null) {
            return false;
        }

        return $data;
    }

    function getCustomerAllowReceive() {
        $query = $this->sqlBuilder
                ->select("customer", [])
                ->where("allow", 1)
                ->getSQL();

        $data = $this->db->Select($query);

        if ($data == null) {
            return false;
        }

        return $data;
    }
}
?>