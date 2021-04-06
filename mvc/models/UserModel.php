<?php
require_once "./mvc/patterns/Database/DatabaseInstance.php";
require_once "./mvc/patterns/SqlQuery/SQLQueryBuilder.php";

class UserModel {
    protected $db;
    private static $unique;
    private $sqlBuilder;

    private function __construct() {
        $this->db = DatabaseInstance::getDatabaseInstance();
        $this->sqlBuilder = new SQLQueryBuilder();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new UserModel();
        }
        return Self::$unique;
    }

    function getUser($username, $pass) {
        $query = $this->sqlBuilder
                ->select("account", ["id_permission", "id","firstName", "lastName"])
                ->where("userName","'$username'")
                ->and("password","'$pass'")
                ->getSQL();

        $data = $this->db->Select($query);

        if ($data == null) {
            return false;
        }

        return $data;
    }

    function getEmployers() {
        $query = $this->sqlBuilder
            ->select("account", ["account.id", "account.firstName", "account.lastName", "account.email", "account_permission.role"])
            ->inner_join("account_permission")
            ->on("account.id_permission", "account_permission.permission")
            ->getSQL();

        // exit($query . "");

        $data = $this->db->Select($query);

        if($data == null) {
            return false;
        }

        return $data;
    }

    public function insertAccount($lastname, $firstname, $phone, $email, $permission, $username, $password) {
        $query = $this->sqlBuilder
                ->insert("account", ["id_permission", "lastName", "firstName", "userName", "password", "email", "phone"],
                                    [$permission, "'$lastname'", "'$firstname'", "'$username'", "'$password'", "'$email'", "'$phone'"])
                ->getSQL();

        $data = $this->db->Insert($query);

        if ($data == null) {
            return false;
        }
        return $data;
    }

    public function getUserNameById($id) {
        $query = $this->sqlBuilder
                ->select("account", ["lastName", "firstName"])
                ->getSQL();

        $data = $this->db->Select($query);

        if ($data == null) {
            return false;
        }
        return $data;
    } 
}
?>