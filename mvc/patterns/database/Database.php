<?php

interface Database {
    public function CreateConnection();
    // public function SetCommand($cmdText);
    public function Insert($cmd);
    public function Update($cmd);
    public function Select($cmd);
    public function Delete($cmd);
}

?>
