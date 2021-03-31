<?php

abstract class Order {
    final public function OrderProcess() {
        $this->pay();
        $this->saveOrder();
        $this->updateStock();
    }

    abstract public function pay();

    protected function updatestock() {

    }

    protected function saveOrder() {

    }
}

?>