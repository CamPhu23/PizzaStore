<?php 
    interface IProtectionProxy {
        function CreateNewOrder();
        function CreateNewOrderProcess();
        function OrderComplete();
        function CreateNewCustomerAccount();
        function EmployerManagement();
        function APIStockManagement_Character();
        function APIStockManagement_AsQuantity();
        function APIStockManagement_DesQuantity();
        function ShowMemberCard($fullname, $phone, $email);
        function CreateNewPost();
        function APICreateNewPostProcess();
        function DeleteCustomerAccount();
        function DeleteCustomerAccountProcess();
    }
?>  