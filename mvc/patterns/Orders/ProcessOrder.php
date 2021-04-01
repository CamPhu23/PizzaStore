<?php

require_once './mvc/patterns/Orders/Order.php';
require_once './mvc/patterns/Orders/OrderPayByCash.php';
require_once './mvc/patterns/Orders/OrderPayByCreditCard.php';

class ProcessOrder {
    private $order;

    private $phone_number, $total_price, $list_products, $quantity_products, $note, $credit_card_id = '', $cash = '', $change;

    public function __construct($phone_number, $total_price, $list_products, $quantity_products, $note)
    {
        $this->phone_number = $phone_number;
        $this->total_price = $total_price;
        $this->list_products = $list_products;
        $this->quantity_products = $quantity_products;
        $this->note = $note;
    }

    private function isCreditCard() {
        return isset($this->credit_card_id);
    }

    private function isCash() {
        return isset($this->cash);
    }

    public function setCashPayMethod($cash, $change) {
        $this->cash = $cash;
        $this->change = $change;
    }

    public function setCreditCardPayMethod($credit_card_id) {
        $this->credit_card_id = $credit_card_id;
    }

    public function process() {
        if ($this->isCash())
            $this->order = new OrderPayByCash($this->phone_number, $this->total_price, $this->list_products, $this->quantity_products, $this->note, $this->cash, $this->change);
        else if ($this->isCreditCard())
            $this->order = new OrderPayByCreditCard($this->phone_number, $this->total_price, $this->list_products, $this->quantity_products, $this->note, $this->credit_card_id);

        $this->order->OrderProcess();
    }
}

?>
