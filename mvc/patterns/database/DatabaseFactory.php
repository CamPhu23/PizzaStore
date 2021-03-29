<?php

interface DatabaseFactory {
    public function CreateConnection();
    public function SetCommand($cmdText);
    public function Excute();
}

?>
