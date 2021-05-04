<?php 
require_once './mvc/patterns/Bill/IBillBuilder.php';

class BillBuilder implements IBillBuilder {
    public $storeName, $storeAddress, $storePhone, $bill_ID, $paymentTime, $sellerName, $customerName, 
            $customerPay, $totalPrice, $items, $paymentMethod, $customerCardBankId, $customerPhone, 
            $customerChange = 0, $quantity, $itemCost, $itemsName;
    
    function __construct($storeName, $storeAddress, $storePhone, $bill_ID, 
                        $paymentTime, $sellerName, $customerName, $customerPay, 
                        $totalPrice, $items, $paymentMethod, $customerCardBankId, 
                        $customerPhone, $customerChange = 0, $quantity, $itemCost, 
                        $itemsName) {

        $this->storeName = $storeName;
        $this->storeAddress = $storeAddress;
        $this->storePhone = $storePhone;
        $this->bill_ID = $bill_ID;
        $this->sellerName = $sellerName;
        $this->customerName = $customerName;
        $this->customerPay = $customerPay;
        $this->totalPrice = $totalPrice;
        $this->items = $items;
        $this->paymentMethod = $paymentMethod;
        $this->customerCardBankId = $customerCardBankId;
        $this->customerPhone = $customerPhone;
        $this->customerChange = $customerChange;
        $this->quantity = $quantity;
        $this->itemCost = $itemCost;
        $this->itemsName = $itemsName;
    }

    public function setStoreName($storeName) :IBillBuilder {
        $this->storeName = $storeName;
    }

    public function setStoreAddress($storeAddress) :IBillBuilder {
        $this->storeAddress = $storeAddress;
    }

    function setCustomerPhone($customerPhone) :IBillBuilder {
        $this->customerPhone = $customerPhone;
    }


    public function setStorePhone($storePhone) :IBillBuilder {
        $this->storePhone = $storePhone;
    }

    public function setBillId($bill_ID) :IBillBuilder {
        $this->bill_ID = $bill_ID; 
    }

    public function setPaymentTime($paymentTime) :IBillBuilder {
        $this->paymentTime = $paymentTime; 
    }

    public function setSellerName($sellerName) :IBillBuilder {
        $this->sellerName = $sellerName; 
    }

    public function setPaymentMothod($paymentMethod) :IBillBuilder {
        $this->paymentMethod = $paymentMethod; 
    }

    public function setItems($items) :IBillBuilder {
        $this->items = $items; 
    }

    function setItemsName($itemsName) :IBillBuilder {
        $this->itemsName = $itemsName;
    }

    public function setItemCost($cost) :IBillBuilder {

        for ($i = 0; $i < count($cost); $i++) {
            $this->itemCost[] = $cost[$i] * $this->quantity[$i]; 
        }

    }

    function setQuantity($quantity) :IBillBuilder {
        $this->quantity = $quantity; 
    }

    public function setTotalPrice($totalPrice) :IBillBuilder {
        $this->totalPrice = $totalPrice;
        $this->customerPay = $totalPrice;
    }

    public function setCustomerName($customerName) :IBillBuilder {
        $this->customerName = $customerName; 
    }

    public function setCustomerPay($customerPay) :IBillBuilder {
        $this->customerPay = $customerPay; 
    }

    function setCustomerChange($customerChange) :IBillBuilder {
        $this->customerChange = $customerChange; 
    }

    public function setCustomerCardBankId($customerCardBankId) :IBillBuilder {
        $this->customerCardBankId = $customerCardBankId;
    }

    public function getStoreName() :IBillBuilder {
        return $this->storeName;
    }

    public function getStoreAddress() :IBillBuilder {
        return $this->storeAddress;
    }

    function getCustomerPhone() :IBillBuilder {
        return $this->customerPhone;
    }


    public function getStorePhone() :IBillBuilder {
        return $this->storePhone;
    }

    public function getBillId() :IBillBuilder {
        return $this->bill_ID;
    }

    public function getPaymentTime() :IBillBuilder {
        return $this->paymentTime;
    }

    public function getSellerName() :IBillBuilder {
        return $this->sellerName;
    }

    public function getPaymentMothod() :IBillBuilder {
        return $this->paymentMethod;
    }

    public function getItems() :IBillBuilder {
        return $this->items;
    }

    function getItemsName() :IBillBuilder {
        return $this->itemsName;
    }

    public function getItemCost() :IBillBuilder {
        return $this->itemCost;
    }

    function getQuantity() :IBillBuilder {
        return $this->quantity;
    }

    public function getTotalPrice() :IBillBuilder {
        return $this->totalPrice;
    }

    public function getCustomerName() :IBillBuilder {
        return $this->customerName;
    }

    public function getCustomerPay() :IBillBuilder {
        return $this->customerPay;
    }

    function getCustomerChange() :IBillBuilder {
        return $this->customerChange;
    }

    public function getCustomerCardBankId() :IBillBuilder {
        return $this->customerCardBankId;
    }

    public function getBill() {}

}
?>