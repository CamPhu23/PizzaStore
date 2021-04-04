<?php

require_once "./mvc/models/CustomerModel.php";
require_once "./mvc/patterns/CreateCustomer/IssueMemberCard.php";
require_once "./mvc/patterns/CreateCustomer/Mail.php";

class CustomerAccountFacade {
    private $modal;
    private $issueCard;
    private $mailer;
    private static $instance;

    private function __construct() {
        $this->modal = CustomerModel::getInstance();
        $this->issueCard = new IssueMemberCard();
        $this->mailer = new Mail();
    }

    public static function getInstance() {
        if (Self::$instance == null) {
            Self::$instance = new CustomerAccountFacade();
        }
        return Self::$instance;
    }

    public function createMemberCard($fullname, $email, $phone, $allow) {
        $this->modal->insertCustomer($fullname, $phone, $email, $allow);
        $this->mailer->sendMailRegistSuccess($email, $fullname);
        $this->issueCard->generate($fullname, $phone, $email);
    }

    public function cancelMemberCard($id) {
        $data = $this->modal->getCustomerById($id);
        if (!$data) {
            $fullname = $data[0]["fullname"];
            $email = $data[0]["email"];

            $this->modal->deleteCustomer($id);
            $this->mailer->sendMailCancelSuccess($email, $fullname);
            $this->issueCard->destroy();
        }
    }
}

?>