<?php 
    require_once './mvc/patterns/Services/IProtectionProxy.php';
    require_once './mvc/controllers/Home.php';

    class HomeService implements IProtectionProxy {
        private $home;
        private static $unique;

        private $permission;

        private function __construct() {
            $this->home = new Home();

            if (isset($_SESSION["permission"])) {
                $this->permission = $_SESSION["permission"];
            } else {
                print_r("Bạn cần đăng nhập trước");
                exit();
            }
        }

        public static function getInstance() {
            if (Self::$unique == null) {
                Self::$unique = new HomeService();
            }
            return Self::$unique;
        }

        function CreateNewOrder() {
            if ($this->permission == 2) {
                $this->home->CreateNewOrder();
            } else {
                print_r("Bạn cần quyền số 2");
            }
        }

        function CreateNewOrderProcess() {
            if ($this->permission == 2) {
                $this->home->CreateNewOrderProcess();
            } else {
                print_r("Bạn cần quyền số 2");
            }
        }

        function OrderComplete() {
            if ($this->permission == 3) {
                $this->home->OrderComplete();
            } else {
                print_r("Bạn cần quyền số 3");
            }
        }

        function StockInRequest() {
            if ($this->permission == 1 || $this->permission == 3) {
                $this->home->StockInRequest();
            } else {
                print_r("Bạn cần quyền số 1 hoặc 3");
            }
        }

        function CreateNewCustomerAccount() {
            if ($this->permission == 2) {
                $this->home->CreateNewCustomerAccount();
            } else {
                print_r("Bạn cần quyền số 2");
            }
        }
        
        function EmployerManagement() {
            if ($this->permission == 1) {
                $this->home->EmployerManagement();
            } else {
                print_r("Bạn cần quyền số 1");
            } 
        }

        function CreateNewEmployerProcess() {
            if ($this->permission == 1) {
                $this->home->CreateNewEmployerProcess();
            } else {
                print_r("Bạn cần quyền số 1");
            }
        }

        function DeleteCustomerAccount() {
            if ($this->permission == 2) {
                $this->home->DeleteCustomerAccount();
            } else {
                print_r("Bạn cần quyền số 2");
            }
        }
    
        function DeleteCustomerAccountProcess() {
            if ($this->permission == 2) {
                $this->home->DeleteCustomerAccountProcess();
            } else {
                print_r("Bạn cần quyền số 2");
            }
        }
    
        function SalesManagement() {
            if ($this->permission == 1) {
                $this->home->SalesManagement();
            } else {
                print_r("Bạn cần quyền số 1");
            }
        }
    
        function CreateReport() {
            if ($this->permission == 1) {
                $this->home->CreateReport();
            } else {
                print_r("Bạn cần quyền số 1");
            }
        }
    
        function StockManagement() {
            if ($this->permission == 1) {
                $this->home->StockManagement();
            } else {
                print_r("Bạn cần quyền số 1");
            }
        }

        function CreateNewCustomerAccountProcess() {
            if ($this->permission == 2) {
                $this->home->CreateNewCustomerAccountProcess();
            } else {
                print_r("Bạn cần quyền số 2");
            }
        }
    
        function StockInRequestProcess() {
            if ($this->permission == 1 || $this->permission == 3) {
                $this->home->StockInRequestProcess();
            } else {
                print_r("Bạn cần quyền số 1 hoặc 3");
            }
        }
    
        function OrderCompleteProcess() {
            if ($this->permission == 3) {
                $this->home->OrderCompleteProcess();
            } else {
                print_r("Bạn cần quyền số 3");
            }
        }

        function APIStockManagement_Character() {
            if ($this->permission == 1) {
                $this->home->APIStockManagement_Character();
            } else {
                print_r("Bạn cần quyền số 1");
            }
        }
        
        function APIStockManagement_AsQuantity() {
            if ($this->permission == 1) {
                $this->home->APIStockManagement_AsQuantity();
            } else {
                print_r("Bạn cần quyền số 1");
            }
        }

        function APIStockManagement_DesQuantity() {
            if ($this->permission == 1) {
                $this->home->APIStockManagement_DesQuantity();
            } else {
                print_r("Bạn cần quyền số 1");
            }
        }

        function ShowMemberCard($fullname, $phone, $email) {
            if ($this->permission == 2) {
                $this->home->ShowMemberCard($fullname, $phone, $email);
            } else {
                print_r("Bạn cần quyền số 2");
            }
        }

        function CreateNewPost() {
            if ($this->permission == 1) {
                $this->home->CreateNewPost();
            } else {
                print_r("Bạn cần quyền số 1");
            }
        }

        function APICreateNewPostProcess() {
            if ($this->permission == 1) {
                $this->home->APICreateNewPostProcess();
            } else {
                print_r("Bạn cần quyền số 1");
            }
        }
    }
?>