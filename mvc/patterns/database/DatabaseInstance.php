<?php 
    require_once './mvc/patterns/database/SimpleFactory.php';

    class DatabaseInstance {
        private static $type = "MySQL";

        public static function getDatabaseInstance() {
            $factory = SimpleFactory::getSimpleFactory(Self::$type);
            $factory->CreateConnection();

            return $factory;
        } 
    }
?>