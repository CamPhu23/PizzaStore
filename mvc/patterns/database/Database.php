<?php

interface Database {
    public function CreateConnection();
    public function SetCommand($cmdText);
    public function Execute();
}

?>
