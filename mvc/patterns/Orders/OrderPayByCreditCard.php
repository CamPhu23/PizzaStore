<?php
//require_once './mvc/patterns/Orders/Order.php';

class OrderPayByCreditCard extends Order {

    public function pay()
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(array('code' => 2));
    }
}

?>
