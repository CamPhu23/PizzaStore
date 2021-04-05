<?php

require_once './mvc/patterns/Post/IObserve.php';
require_once './mvc/models/CustomerModel.php';

class SendEmail implements IObserve {
    public function update($tit, $con, $type)
    {
        $modal = CustomerModel::getInstance();
        $data = $modal->getCustomerAllowReceive();

        $mailer = new Mail();

        foreach ($data as $row) {
            $email = $row["email"];
            $fullname = $row["fullname"];

            $title = "[TIN NHẮN TỰ ĐỘNG]$tit của Pizza Store";
            $content = "<h5> Xin chào $fullname, </h5>
                    <p> Cửa hàng Pizza Store xin trân trọng giới thiệu với $fullname một $type.</p> 
                    <p> $con.</p>
                    
                    <p>Mọi thắc mắc xin liên hệ cửa hàng Pizza Store Vietnam:</p>
                    <p><b>Địa chỉ:</b> 19 Nguyễn Hữu Thọ P.Tân Phong Q.7</p>
                    <p><b>SĐT:</b> 0123455678</p>
                    <p><b>Email:</b> a@b.com</p>";
                    
            $mailer->sendMailNotifyNewPost($title, $content, $email);
        }
    }
}