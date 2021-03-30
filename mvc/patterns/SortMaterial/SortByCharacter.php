<?php

class SortByCharacter implements SortType {

    public function excuteSort($data) {
        $name = array_column($data, 'goods_name');
        array_multisort($name, SORT_ASC, $data);

        return $data;
    }
}

?>