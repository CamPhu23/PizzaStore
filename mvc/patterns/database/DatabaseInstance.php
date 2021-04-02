<?php 
    require_once './mvc/patterns/database/SimpleFactory.php';

    class DatabaseInstance {
        private $factory;
        private $conn;
        private $type = "MySQL";

        public function __construct() {
            $this->factory = SimpleFactory::getSimpleFactory($this->type);
            $this->conn = $this->factory->CreateConnection();
        }

        public function Insert($query) {
            $this->factory->SetCommand($query);
            $result = $this->factory->Execute();

            if ($result) {
                return $this->conn->insert_id;
            } else {
                return $result;
            }
        }

        public function Update($query) {
            $this->factory->SetCommand($query);
            $result = $this->factory->Execute();

            return $result;
        }

        public function Select($query) {
            $this->factory->SetCommand($query);
            $result = $this->factory->Execute();

            if ($result  == null) {
                return null;
            } 

            $data = array();

            if ($this->type == "MySQL") {
                
                if ($result ->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        array_push($data, $row);
                    }
                }

            } else if ($this->type == "MsSQL") {
                
                if (mssql_num_rows($result) > 0) {
                    while($row = mssql_fetch_assoc($result)) {
                        array_push($data, $row);
                    }
                }
            }

            return $data;
        }

        public function Delete($query) {
            $this->factory->SetCommand($query);
            $result = $this->factory->Execute();

            return $result;
        }
    }
?>