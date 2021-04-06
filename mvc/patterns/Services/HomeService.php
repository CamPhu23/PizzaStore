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
                $root = "";

                if (isset($_GET["url"])) {
                    $url = explode("/", filter_var(trim($_GET["url"], "/")));
                    $level = count($url);

                    while ($level > 1) {
                        $root = $root . "../";
                        $level--;
                    }
                }

                header("Location: $root" . "Account/Login");
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
                $this->Error();
            }
        }

        function CreateNewOrderProcess() {
            if ($this->permission == 2) {
                $this->home->CreateNewOrderProcess();
            } else {
                $this->Error();
            }
        }

        function OrderComplete() {
            if ($this->permission == 3) {
                $this->home->OrderComplete();
            } else {
                $this->Error();
            }
        }

        function CreateNewCustomerAccount() {
            if ($this->permission == 2) {
                $this->home->CreateNewCustomerAccount();
            } else {
                $this->Error();
            }
        }
        
        function EmployerManagement() {
            if ($this->permission == 1) {
                $this->home->EmployerManagement();
            } else {
                $this->Error();
            } 
        }

        function CreateNewEmployerProcess() {
            if ($this->permission == 1) {
                $this->home->CreateNewEmployerProcess();
            } else {
                $this->Error();
            }
        }

        function DeleteCustomerAccount() {
            if ($this->permission == 2) {
                $this->home->DeleteCustomerAccount();
            } else {
                $this->Error();
            }
        }
    
        function DeleteCustomerAccountProcess() {
            if ($this->permission == 2) {
                $this->home->DeleteCustomerAccountProcess();
            } else {
                $this->Error();
            }
        }
    
        function SalesManagement() {
            if ($this->permission == 1) {
                $this->home->SalesManagement();
            } else {
                $this->Error();
            }
        }
    
        function CreateReport() {
            if ($this->permission == 1) {
                $this->home->CreateReport();
            } else {
                $this->Error();
            }
        }
    
        function StockManagement() {
            if ($this->permission == 1) {
                $this->home->StockManagement();
            } else {
                $this->Error();
            }
        }

        function CreateNewCustomerAccountProcess() {
            if ($this->permission == 2) {
                $this->home->CreateNewCustomerAccountProcess();
            } else {
                $this->Error();
            }
        }
    
        function OrderCompleteProcess() {
            if ($this->permission == 3) {
                $this->home->OrderCompleteProcess();
            } else {
                $this->Error();
            }
        }

        function APIStockManagement_Character() {
            if ($this->permission == 1) {
                $this->home->APIStockManagement_Character();
            } else {
                $this->Error();
            }
        }
        
        function APIStockManagement_AsQuantity() {
            if ($this->permission == 1) {
                $this->home->APIStockManagement_AsQuantity();
            } else {
                $this->Error();
            }
        }

        function APIStockManagement_DesQuantity() {
            if ($this->permission == 1) {
                $this->home->APIStockManagement_DesQuantity();
            } else {
                $this->Error();
            }
        }

        function ShowMemberCard($fullname, $phone, $email) {
            if ($this->permission == 2) {
                $this->home->ShowMemberCard($fullname, $phone, $email);
            } else {
                $this->Error();
            }
        }

        function CreateNewPost() {
            if ($this->permission == 1) {
                $this->home->CreateNewPost();
            } else {
                $this->Error();
            }
        }

        function APICreateNewPostProcess() {
            if ($this->permission == 1) {
                $this->home->APICreateNewPostProcess();
            } else {
                $this->Error();
            }
        }

        function Error() {
            $this->home->Error();
        }
    }
?>