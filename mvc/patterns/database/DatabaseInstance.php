<?php 
    require_once './mvc/patterns/database/SimpleFactory.php';

    class DatabaseInstance {
        public static function getDatabaseInstance() {
            return SimpleFactory::getSimpleFactory("MySQL");
        }
    }
?>