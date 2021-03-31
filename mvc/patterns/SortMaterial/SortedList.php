<?php

require_once "./mvc/patterns/SortMaterial/SortType.php";
require_once "./mvc/patterns/SortMaterial/SortByCharacter.php";
require_once "./mvc/patterns/SortMaterial/SortByMaterialQuantityDescending.php";
require_once "./mvc/patterns/SortMaterial/SortByMaterialQuantityAscending.php";

class SortedList {
    private $strategy;
    private $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function setSortStrategy($strategy) {
        $this->strategy = $strategy;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function sort() {
        return $this->strategy->excuteSort($this->data);
    }
}
