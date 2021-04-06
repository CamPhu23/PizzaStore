<?php 
require_once './mvc/patterns/bill/IBillBuilder.php';

class BillBuilder implements IBillBuilder {
    public $storeName, $storeAddress, $storePhone, $bill_ID, $paymentTime, $sellerName, $customerName, 
            $customerPay, $totalPrice, $items, $paymentMethod, $customerCardBankId, $customerPhone, 
            $customerChange = 0, $quantity, $itemCost, $itemsName;
    
    function __construct($storeName, $storeAddress, $storePhone) {
        $this->storeName = $storeName;
        $this->storeAddress = $storeAddress;
        $this->storePhone = $storePhone;
    }

    public function setStoreName($storeName) :IBillBuilder {
        $this->storeName = $storeName;
        return $this;
    }

    public function setStoreAddress($storeAddress) :IBillBuilder {
        $this->storeAddress = $storeAddress;
        return $this;
    }

    function setCustomerPhone($customerPhone) :IBillBuilder {
        $this->customerPhone = $customerPhone;
        return $this;
    }


    public function setStorePhone($storePhone) :IBillBuilder {
        $this->storePhone = $storePhone;
        return $this;
    }

    public function setBillId($bill_ID) :IBillBuilder {
        $this->bill_ID = $bill_ID; 
        return $this;
    }

    public function setPaymentTime($paymentTime) :IBillBuilder {
        $this->paymentTime = $paymentTime; 
        return $this;
    }

    public function setSellerName($sellerName) :IBillBuilder {
        $this->sellerName = $sellerName; 
        return $this;
    }

    public function setPaymentMothod($paymentMethod) :IBillBuilder {
        $this->paymentMethod = $paymentMethod; 
        return $this;
    }

    public function setItems($items) :IBillBuilder {
        $this->items = $items; 
        return $this;
    }

    function setItemsName($itemsName) :IBillBuilder {
        $this->itemsName = $itemsName;
        return $this;
    }

    public function setItemCost($cost) :IBillBuilder {

        for ($i = 0; $i < count($cost); $i++) {
            $this->itemCost[] = $cost[$i] * $this->quantity[$i]; 
        }

        return $this;
    }

    function setQuantity($quantity) :IBillBuilder {
        $this->quantity = $quantity; 
        return $this;
    }

    public function setTotalPrice($totalPrice) :IBillBuilder {
        $this->totalPrice = $totalPrice;
        $this->customerPay = $totalPrice;
        return $this;
    }

    public function setCustomerName($customerName) :IBillBuilder {
        $this->customerName = $customerName; 
        return $this;
    }

    public function setCustomerPay($customerPay) :IBillBuilder {
        $this->customerPay = $customerPay; 
        return $this;
    }

    function setCustomerChange($customerChange) :IBillBuilder {
        $this->customerChange = $customerChange; 
        return $this;
    }

    public function setCustomerCardBankId($customerCardBankId) :IBillBuilder {
        $this->customerCardBankId = $customerCardBankId;
        return $this;
    }

    public function getBill() {
        return $this;
    }

}
?>