<?php
namespace controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use model\db as DB;
use model\Register;
use model\Mailer; 
class sendPasswordreset{
    public function sendpasswordreset(){
        $db_instance = new DB();
        $db = $db_instance->connect();
        $register = new Register($db);
        $mailer = new Mailer();
        if (isset($_POST["submit"])) {
            $register->email =  $_POST['email'] ;
            $return = $register->resetpass();
            if ($return) {
                $subject = "Password Reset";
                $body = "Mầy không kích vào mầy là con lợn <a href='http://localhost/php2/reset-password?token=$return'>here</a> to reset your password.";

                if ($mailer->Mailer($register->email, $subject, $body)) {
                    echo '<h3 class="container">Thư đã được gửi, vui lòng kiểm tra hộp thư đến của bạn.</h3>';
                } else {
                    echo "Không thể gửi thư.";
                }
            } else {
                echo "Lỗi khi cập nhật cơ sở dữ liệu. Vui lòng thử lại.";
            }
        }
        exit();
    }
}