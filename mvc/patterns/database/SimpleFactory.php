<?php 
    require_once './mvc/patterns/database/MysqlDatabase.php';
    require_once './mvc/patterns/database/MssqlDatabase.php';

    class SimpleFactory {
        public static function getSimpleFactory($database) {
            if ($database == "MySQL") {
                return MysqlDatabase::getInstance("localhost", "root", "", "pizza_store");
            }
            else if ($database == "MsSQL") {
                return MssqlDatabase::getInstance("localhost", "root", "", "pizza_store");
            }
        }

    }
?>