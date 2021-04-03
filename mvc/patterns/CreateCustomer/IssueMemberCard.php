<?php

class IssueMemberCard {

    public function __construct() {

    }

    public function destroy() {
        echo "Destroyed member card";
    }

    public function generate($fullname, $phone, $email) {

        header('Location: ../Home/ShowMemberCard/' . $fullname . "/" . $phone . "/" . $email);
    }
}

?>
