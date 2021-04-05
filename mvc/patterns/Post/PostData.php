<?php

require_once './mvc/models/PostModel.php';

class PostData {
    private $observes;

    public function __construct() {
        $this->observes = array();
    }

    public function newPost($title, $content, $type) {
        $modal = PostModel::getInstance();
        $result = $modal->insertPost($title, $content, $type);

        if (!$result) {
            exit(json_encode(array("status" => "fail", "messages" => "Đăng bài thất bại")));
        }

        $this->notifyObserve($title, $content, $type);
        exit(json_encode(array("status" => "success", "messages" => "Đã đăng bài thành công")));
    }

    private function notifyObserve($title, $content, $type) {
        foreach ($this->observes as $obs) {
            $obs->update($title, $content, $type);
        }
    }

    public function addObserves($obs)
    {
        array_push($this->observes, $obs);
    }
}

?>
