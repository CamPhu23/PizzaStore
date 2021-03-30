<?php

class SortByMaterialQuantityDescending implements SortType {

    public function excuteSort($data) {
        $quantity = array_column($data, 'quantity');
        array_multisort($quantity, SORT_DESC, $data);

        return $data;
    }
}

?>