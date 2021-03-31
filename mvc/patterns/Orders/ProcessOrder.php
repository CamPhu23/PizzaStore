<?php

require_once './mvc/patterns/Orders/Order.php';
require_once './mvc/patterns/Orders/OrderPayByCash.php';
require_once './mvc/patterns/Orders/OrderPayByCreditCard.php';

class ProcessOrder {
    private $order;

    private $phone_number, $total_price, $list_products, $quantity_products, $note, $credit_card_id, $cash, $change;

    public function __construct($phone_number, $total_price, $list_products, $quantity_products, $note, $credit_card_id, $cash, $change)
    {
        $this->phone_number = $phone_number;
        $this->total_price = $total_price;
        $this->list_products = $list_products;
        $this->quantity_products = $quantity_products;
        $this->note = $note;
        $this->credit_card_id = $credit_card_id;
        $this->cash = $cash;
        $this->change = $change;
    }

    private function isCreditCard() {
        return $this->credit_card_id === '' ? false : true;
    }

    private function isCash() {
        return $this->cash === '' ? false : true;
    }

    public function process() {
        if ($this->isCash())
            $this->order = new OrderPayByCash();
        else if ($this->isCreditCard())
            $this->order = new OrderPayByCreditCard();

        $this->order->OrderProcess();
    }
}

?>
