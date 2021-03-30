<?php 
    interface IProtectionProxy {
        function CreateNewOrder();
        function CreateNewOrderProcess();
        function OrderComplete();
        function StockInRequest();
        function CreateNewCustomerAccount();
        function EmployerManagement();
    }
?>  