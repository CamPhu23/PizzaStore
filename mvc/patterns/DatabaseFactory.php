<?php

abstract class DatabaseFactory {
    abstract public function CreateConnection();
    abstract public function CreateCommand($cmdText);    
    abstract public function Excute($conn);
}

?>
