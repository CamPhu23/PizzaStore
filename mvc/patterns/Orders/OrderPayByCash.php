<?php
//require_once './mvc/patterns/Orders/Order.php';

class OrderPayByCash extends Order {
    private $cash, $change;
    public function __construct($phone_number, $total_price, $list_products, $quantity_products, $note, $cash, $change)
    {
        $this->cash = $cash;
        $this->change = $change;
        parent::__construct($phone_number, $total_price, $list_products, $quantity_products, $note);
    }

    public function pay()
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(array('code' => 1, 'message' => 'Đang mở ngăn kéo đựng tiền'));
    }
}

?>
