<?php
//CAN CHUYEN RESULT CUA EXCUTE THANH 1 KIEU THUOC TINH
require_once "./mvc/patterns/database/Database.php";

class MysqlDatabase implements Database {
    protected $servername, $username, $password, $dbname, $conn;
    private static $instance;

    public static function getInstance($servername, $username, $password, $dbname) {
        if (self::$instance == null) {
            self::$instance = new MysqlDatabase($servername, $username, $password, $dbname);
        }

        return self::$instance;
    }

    private function __construct($servername, $username, $password, $dbname) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function CreateConnection() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if (!$this->conn) {
            die("Connect data failed!");
        }

        return $this->conn;
    }

    public function Insert($cmd) {
        $query = $this->conn->query($cmd);
        
        if ($query) {
            return $this->conn->insert_id;
        } else {
            return $query;
        }
    }

    public function Select($cmd) {
        $query = $this->conn->query($cmd);

        $data = array();

        if ($query ->num_rows > 0) {
            while($row = $query->fetch_assoc()) {
                array_push($data, $row);
            }
        }

        return $data;
    }

    public function Update($cmd) {
        return $this->conn->query($cmd);
    }

    public function Delete($cmd) {
        return $this->conn->query($cmd);
    }
}

?>