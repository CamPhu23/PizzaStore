<?php

class IssueMemberCard {

    public function __construct() {

    }

    public function destroy() {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(array('code' => 0, 'message' => 'Tài khoản khách hàng đã bị hủy'));
    }

    public function generate($fullname, $phone, $email) {

        header('Location: ../Home/ShowMemberCard/' . $fullname . "/" . $phone . "/" . $email);
    }
}

?>
