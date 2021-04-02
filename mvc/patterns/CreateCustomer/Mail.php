<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

//------------------------------------- Mail -----------------------------------------//
class Mail {
    private $mail;

    public function __construct() {
        // Instantiation and passing `true` enables exceptions
        $this->mail = new PHPMailer(true);
    }

    public function sendMailRegistSuccess($email, $fullname) {
        $title = "Chúc mừng bạn đã trở thành khách hàng thân thiết của Pizza Store";
        $content = "<h5> Xin chào $fullname, </h5>
                    <br>
                    <p> Chúc mừng bạn đã trở thành khách hàng thân thiết của Pizza Store. </p>";

        try {
            $this->config($email);
                  // Set email format to HTML
            $this->mail->Subject = $title;
            $this->mail->Body = $content;
            $this->mail->send();

        } catch (Exception $e) {
            return "false";
        }
    }

    public function sendMailCancelSuccess($email, $fullname) {
        $title = "Thông báo hủy đăng ký khách hàng thân thiết tại Pizza Store";
        $content = "<h5> Xin chào $fullname, </h5>
                    <br>
                    <p> Đây là email thông báo rằng bạn đã hủy đăng ký khách hàng thân thiết tại Pizza Strore. Hẹn một gặp lại bạn tại Pizza Store một ngày không xa. </p>";

        try {
            $this->config($email);
            // Set email format to HTML
            $this->mail->Subject = $title;
            $this->mail->Body = $content;
            $this->mail->send();

        } catch (Exception $e) {
            return "false";
        }
    }

    private function config($email) {
        //Server settings
        $this->mail->SMTPDebug = 0;                      // Enable verbose debug output
        $this->mail->isSMTP();                                            // Send using SMTP
        $this->mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $this->mail->Username   = 'gakonsaxnuoc22@gmail.com';                     // SMTP username
        $this->mail->Password   = 'Thanhtri00';                               // SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $this->mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $this->mail->setFrom('gakonsaxnuoc22@gmail.com', 'Tri');
        $this->mail->addAddress($email, 'Người dùng');     // Add a recipient
        $this->mail->CharSet = 'UTF-8';

        // Content
        $this->mail->isHTML(true);
    }
}