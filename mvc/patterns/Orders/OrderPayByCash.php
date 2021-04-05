<?php
require_once './mvc/models/CashMethodModel.php';

class OrderPayByCash extends Order {
    private $cash, $change;
    public function __construct($phone_number, $total_price, $list_products, $quantity_products, $note, $cash, $change)
    {
        $this->cash = $cash;
        $this->change = $change;
        parent::__construct($phone_number, $total_price, $list_products, $quantity_products, $note);
    }

    public function pay($id_order)
    {
        $cashModel = CashMethodModel::getInstance();
        $result = $cashModel->insertCashMethod($id_order, (int)$this->cash);

        header('Content-Type: application/json; charset=utf-8');
        if ($result === FALSE) {
            echo json_encode(array('code' => 0, 'message' => 'Đã xảy ra lỗi tại OrderPayByCash => Pay'));
        } else {
            echo json_encode(array('code' => 1, 'message' => 'Đang mở ngăn kéo đựng tiền'));
        }
        
    }
}

?>
