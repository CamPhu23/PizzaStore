<?php
require_once "./mvc/patterns/database/DatabaseInstance.php";

class PostModel {
    protected $db;
    private static $unique;

    private function __construct() {
        $this->db = DatabaseInstance::getDatabaseInstance();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new PostModel();
        }
        return Self::$unique;
    }

    public function insertPost($title, $content, $type) {
        $result = $this->db->Insert("INSERT INTO `post`(`title`, `content`, `type`) VALUES ('$title', '$content', '$type')");
        return $result;
    }
}
?>