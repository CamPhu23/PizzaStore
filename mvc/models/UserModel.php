<?php
require_once "./mvc/patterns/database/DatabaseInstance.php";
require_once "./mvc/patterns/sqlQuery/SQLQueryBuilder.php";

class UserModel {
    protected $db;
    private static $unique;

    private function __construct() {
        $this->db = DatabaseInstance::getDatabaseInstance();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new UserModel();
        }
        return Self::$unique;
    }

    function getUser($username, $pass) {
        $sqlBuilder = new SQLQueryBuilder();
        $query = $sqlBuilder
                ->select('account', [id_permission, firstName, lastName])
                ->where("userName","'$username'")
                ->where("password","'$pass'")
                ->getSQL();

        $data = $this->db->Select($query);

        if ($data == null) {
            return false;
        }

        return $data;
    }

    function getEmployers() {
        $data = $this->db->Select("SELECT account.id, account.firstName, account.lastName, account.email, account_permission.role 
            FROM account 
            INNER JOIN account_permission 
            ON (account.id_permission = account_permission.permission)");

        if($data == null) {
            return false;
        }

        return $data;
    }
}
?>