<?php

class SortByMaterialQuantityAscending implements SortType {

    public function excuteSort($data) {
        $quantity = array_column($data, 'quantity');
        array_multisort($quantity, SORT_ASC, $data);

        return $data;
    }
}

?>