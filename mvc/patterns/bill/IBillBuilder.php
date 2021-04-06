<?php
    interface IBillBuilder {
        function setStoreName($storeName) :IBillBuilder;
        function setStoreAddress($storeAddress) :IBillBuilder;
        function setStorePhone($storePhone) :IBillBuilder;
        function setBillId($bill_ID) :IBillBuilder;
        function setPaymentTime($paymentTime) :IBillBuilder;
    
        function setCustomerName($customerName) :IBillBuilder;
        function setCustomerPhone($customerPhone) :IBillBuilder;

        // function setSellerName($sellerName) :IBillBuilder;

        function setPaymentMothod($paymentMethod) :IBillBuilder;

        function setCustomerPay($customerPay) :IBillBuilder;
        function setCustomerChange($customerChange) :IBillBuilder;

        function setCustomerCardBankId($customerCardBankId) :IBillBuilder;

        function setTotalPrice($totalPrice) :IBillBuilder;
        function setItems($items) :IBillBuilder;
        function setQuantity($quantity) :IBillBuilder;
        function setItemCost($cost) :IBillBuilder;
        function setItemsName($itemsName) :IBillBuilder;
    }
?>
