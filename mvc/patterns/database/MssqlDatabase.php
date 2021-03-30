<?php
//CAN CHUYEN RESULT CUA EXCUTE THANH 1 KIEU THUOC TINH
require_once "./mvc/patterns/database/Database.php";

class MssqlDatabase implements Database {
    protected $cmd, $host, $username, $password, $dbname, $conn;
    private static $instance;

    public static function getInstance($host, $dbname, $username, $password) {
        if (self::$instance == null) {
            self::$instance = new MssqlDatabase($host, $dbname, $username, $password);
        }

        return self::$instance;
    }

    private function __construct($host, $dbname, $username, $password) {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }

    public function CreateConnection() {
        $this->conn = mssql_connect($this->host, $this->username, $this->password);
        $conn_db = mssql_select_db($this->dbname, $this->conn);

        if (!$this->conn || !$conn_db) {
            die("Connect data failed!");
        }
    }

    public function SetCommand($cmdText) {
        $this->cmd = $cmdText;
    }

    public function Excute() {
        $query = mssql_query($this->cmd);
        $data = array();
        if (mssql_num_rows($query) > 0) {
            while($row = mssql_fetch_assoc($query)) {
                array_push($data, $row);
            }
        }
        return $data;
    }
}

?>