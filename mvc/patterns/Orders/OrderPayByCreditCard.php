<?php

class OrderPayByCreditCard extends Order {
    private $id;
    public function __construct($phone_number, $total_price, $list_products, $quantity_products, $note, $credit_card_id)
    {
        $this->id = $credit_card_id;
        parent::__construct($phone_number, $total_price, $list_products, $quantity_products, $note);
    }

    public function pay()
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(array('code' => 2, 'message' => 'Đã thanh toán thành công'));
    }
}

?>
