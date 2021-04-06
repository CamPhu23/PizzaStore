<?php 
    interface IProtectionProxy {
        function CreateNewOrder();
        function CreateNewOrderProcess();
        function OrderComplete();
        function CreateNewCustomerAccount();
        function EmployerManagement();
        function CreateNewEmployerProcess();
        function DeleteCustomerAccount();
        function DeleteCustomerAccountProcess();
        function SalesManagement();
        function CreateReport();
        function StockManagement();
        function CreateNewCustomerAccountProcess();
        function OrderCompleteProcess();
        function APIStockManagement_Character();
        function APIStockManagement_AsQuantity();
        function APIStockManagement_DesQuantity();
        function ShowMemberCard($fullname, $phone, $email);
        function CreateNewPost();
        function APICreateNewPostProcess();
    }
?>  