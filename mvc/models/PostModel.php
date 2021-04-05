<?php
require_once "./mvc/patterns/sqlQuery/SQLQueryBuilder.php";
require_once "./mvc/patterns/Database/DatabaseInstance.php";

class PostModel {
    protected $db;
    private static $unique;
    private $sqlBuilder;

    private function __construct() {
        $this->db = DatabaseInstance::getDatabaseInstance();
        $this->sqlBuilder = new SQLQueryBuilder();
    }

    public static function getInstance() {
        if (Self::$unique == null) {
            Self::$unique = new PostModel();
        }
        return Self::$unique;
    }

    public function insertPost($title, $content, $type) {
        $query = $this->sqlBuilder
                ->insert("post", ["title", "content", "type"], ["'$title'", "'$content'", "'$type'"])
                ->getSQL();

        $result = $this->db->Insert($query);
        
        return $result;
    }
}
?>