<?php

class PostgreSQLDatabase extends DatabaseFactory {
    protected $cmd, $host, $port, $username, $password, $dbname;

    public function __construct($host, $port, $dbname, $username, $password) {
        $this->host = $host;
        $this->port = $port;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }

    public function CreateConnection() {
        return pg_connect("host=$this->host port=$this->port dbname=$this->dbname user=$this->username password=$this->password");
    }

    public function CreateCommand($cmdText) {
        $this->cmd = $cmdText;
    }

    public function Excute($conn) {
        $result = query($this->conn, $this->cmd);
        return $result;
    }
}

?>