<?php
namespace controller;
use model\db;
use model\Register;

class processResetPassword{
    public function processresetpassword(){
        session_start();
        $db_instance = new DB();
        $db = $db_instance->connect();
        $register = new Register($db);
        if (isset($_POST["submit"])) {
            $token = $_POST['token'];
            $reset_token = hash("sha256", $token);
            $password_confirm = $_POST["password_confirm"];
            $password = $_POST["password"];
            $passwordErrors = $this->validatePassword($password, $password_confirm);
            if (!empty($passwordErrors)) {
                foreach ($passwordErrors as $error) {
                    die($error);
                }
            }
            $register->reset_token = $reset_token;
            $register->password = $_POST["password"];
            $user_token = $register->resetPassword();
            if ($user_token) {
                $register->id = $user_token["id"];
                $register->reset_token_ex = $user_token["reset_token_ex"];
                $user_process = $register->updatePassword();
                if ($user_process == true){
                    $_SESSION['reset_password_success'] = "Mật khẩu đã được cập nhật.";
                    header("Location:/php2/login");
                    exit();
                }else {
                    die("Invalid token or token has expired");
                }
            } else {
                die("Token not provided");
            }
        }
    }
        public function validatePassword($password, $password_confirm) {
            $errors = [];
    
            if (strlen($password) < 8) {
                $errors[] = "Mật khẩu phải dài ít nhất 8 ký tự.";
            }
    
            if (!preg_match("/[a-z]/i", $password)) {
                $errors[] = "Mật khẩu phải chứa ít nhất 1 chữ cái.";
            }
    
            if (!preg_match("/[0-9]/", $password)) {
                $errors[] = "Mật khẩu phải chứa ít nhất 1 chữ số.";
            }
    
            if ($password !== $password_confirm) {
                $errors[] = "Mật khẩu và mật khẩu xác nhận không khớp.";
            }
    
            return $errors;
    
    }
}