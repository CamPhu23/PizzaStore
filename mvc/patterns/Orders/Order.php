<?php

require_once './mvc/models/OrderModel.php';
require_once './mvc/models/DetailOrderModel.php';

require_once './mvc/models/PrepareMaterialModal.php';
require_once './mvc/models/WareHouseModel.php';

abstract class Order {
    private $phone, $total, $products, $quantity, $note, $id_order;

    public function __construct($phone_number, $total_price, $list_products, $quantity_products, $note)
    {
        $this->phone = $phone_number;
        $this->total = $total_price;
        $this->products = $list_products;
        $this->quantity = $quantity_products;
        $this->note = $note;
    }

    final public function OrderProcess() {
        $this->saveOrder();
        $this->updateStock();
        $this->pay($this->id_order);
    }

    abstract public function pay($id_order);

    protected function updatestock() {
        $goodsWareHouse = array();
        $wareHouseModal = WareHouselModel::getInstance();
        $goodsWareHouse = $wareHouseModal->getGoods();

        $prepareMaterialModal = PrepareMaterialModal::getInstance();
        $material = array();

        $productModel = ProductModel::getInstance();

        for($i = 0; $i < count($this->products); $i++) {

           if (strpos(strtolower($this->products[$i]) , 'pizza') !== false) {
               
                $material = $prepareMaterialModal->getMaterialNameAndQuantityByIdProduct_Quantity($this->products[$i], (int)$this->quantity[$i]);

                // print_r($material);

                for ($j = 0; $j < count($material); $j++) {
                    // $wareHouseModal->updateQuantityByIdMaterialByIdMaterial((int)$material[$j]["id"], (int)$material[$j]["quantity"]);
                    $material = $prepareMaterialModal->getMaterialNameAndQuantityByIdProduct_Quantity($this->products[$i], (int)$this->quantity[$i]);


                    $key = array_search($material[$j]["name"], array_column($goodsWareHouse, 'goods_name'));
                    $goodsWareHouse[$key]["quantity"] -= $material[$j]["quantity"];

                    if ($goodsWareHouse[$key]["quantity"] < 0) {
                        echo "Không đủ số lượng";
                        exit();
                    }
                }


           } else if (strpos(strtolower($this->products[$i]) , 'drink') !== false) {
                // $wareHouseModal->updateQuantityByIdProduct($this->products[$i], (int)$this->quantity[$i]);
                $name = $productModel->getProductNameById($this->products[$i]);

                $key = array_search($name[0]["name"], array_column($goodsWareHouse, 'goods_name'));
                $goodsWareHouse[$key]["quantity"] -= $this->quantity[$i];

                // print_r($goodsWareHouse);
                // print_r($key);

                // exit();

                if ($goodsWareHouse[$key]["quantity"] < 0) {
                    echo "Không đủ số lượng";
                    exit();
                }

           }
        }

        $wareHouseModal->updateQuantity($goodsWareHouse);
    }

    protected function saveOrder() {
        $orderModal = OrderModel::getInstance();

        $time = "0000";
        $result = $orderModal->InsertOrder(1, $this->total, $this->note, $time);
        $this->id_order = $result;

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