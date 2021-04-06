<?php
require_once "./mvc/patterns/Database/Database.php";

class MssqlDatabase implements Database {
    protected $host, $username, $password, $dbname, $conn;
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
        $serverName = "serverName\\sqlexpress";
        $connectionInfo = array( "Database"=>$this->dbname, "UID"=>$this->username, "PWD"=>$this->password);
        $this->conn = sqlsrv_connect( $serverName, $connectionInfo);

        if (!$this->conn) {
            die("Connect data failed!");
        }

        return $this->conn;
    }

    public function Insert($cmd) {
        $query = sqlsrv_query( $this->conn, $cmd);
        
        if ($query) {
            return $this->conn->insert_id;
        } else {
            return $query;
        }
    }

    public function Select($cmd) {
        $query = sqlsrv_query($this->conn, $cmd);
        $data = array();

        if (sqlsrv_num_rows($query) > 0) {
            while($row = sqlsrv_fetch_array($query)) {
                array_push($data, $row);
            }
        }

        return $data;
    }

    public function Update($cmd) {
        return sqlsrv_query($this->conn, $cmd);
    }

    public function Delete($cmd) {
        return sqlsrv_query($this->conn, $cmd);
    }
}

?>