<?php
//CAN CHUYEN RESULT CUA EXCUTE THANH 1 KIEU THUOC TINH
require_once "./mvc/patterns/database/Database.php";

class MysqlDatabase implements Database {
    protected $cmd, $servername, $username, $password, $dbname, $conn;
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
    }

    public function SetCommand($cmdText) {
        $this->cmd = $cmdText;
    }

    public function Execute() {
        $query = $this->conn->query($this->cmd);
        // echo serialize($query);
        // $data = array();

        // if ($query == null) {
        //     return null;
        // } 

        // if ($query->num_rows > 0) {
        //     while($row = $query->fetch_assoc()) {
        //         array_push($data, $row);
        //     }
        // }

        return $query;
    }
}

?>