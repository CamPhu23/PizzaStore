<?php

require_once './mvc/models/OrderModel.php';
require_once './mvc/models/DetailOrderModel.php';

require_once './mvc/models/PrepareMaterialModal.php';
require_once './mvc/models/WareHouseModel.php';

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
        $goodsWareHouse = array();
        $wareHouseModal = WareHouselModel::getInstance();
        $goodsWareHouse = $wareHouseModal->getGoodIdAndQuantity();

        $prepareMaterialModal = PrepareMaterialModal::getInstance();
        $material = array();

        for($i = 0; $i < count($this->products); $i++) {

           if (strpos(strtolower($this->products[$i]) , 'pizza') !== false) {
               
                $material = $prepareMaterialModal->getMaterialIdAndQuantityByIdProduct_Quantity($this->products[$i], (int)$this->quantity[$i]);

                // print_r($material);

                for ($j = 0; $j < count($material); $j++) {
                    $wareHouseModal->updateQuantityByIdMaterialByIdMaterial((int)$material[$j]["id"], (int)$material[$j]["quantity"]);
                }
           } else if (strpos(strtolower($this->products[$i]) , 'drink') !== false) {
                $wareHouseModal->updateQuantityByIdProduct($this->products[$i], (int)$this->quantity[$i]);
           }

        }
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