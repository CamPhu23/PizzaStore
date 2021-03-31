<?php

require_once './mvc/models/OrderModel.php';
require_once './mvc/models/DetailOrderModel.php';

abstract class Order {
    private $phone, $total, $products, $quantity, $note;

    public function __construct($phone_number, $total_price, $list_products, $quantity_products, $note)
    {
        $this->phone = $phone_number;
        $this->total = $total_price;
        $this->products = $list_products;
        $this->quantity = $quantity_products;
        $this->note = $note;
    }

    final public function OrderProcess() {
        $this->pay();
        $this->saveOrder();
        $this->updateStock();
    }

    abstract public function pay();

    protected function updatestock() {

    }

    protected function saveOrder() {
        $orderModal = OrderModel::getInstance();

        $time = "0000";
        $result = $orderModal->InsertOrder(1, $this->total, $this->note, $time);

        if ($result !== false) {
            $detailOrderModal = DetailOrderModel::getInstance();
            $n = count($this->products);
            for($i = 0; $i < $n; $i++) {
                $detailOrderModal->InsertDetailOrder($result, $this->products[$i], $this->quantity[$i]);
            }
        }
    }
}

?>