<?php

require_once "DatabaseFactory.php";

class MysqlDatabase extends DatabaseFactory {
    protected $cmd, $servername, $username, $password, $dbname;

    public function __construct($servername, $username, $password, $dbname) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function CreateConnection() {
        return new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }

    public function CreateCommand($cmdText) {
        $this->cmd = $cmdText;
    }

    public function Excute($conn) {
        $result = $conn->query($this->cmd);
        return $result;
    }
}

?>