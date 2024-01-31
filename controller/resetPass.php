<?php

namespace controller;
use model\Register;
use model\db;
class resetPass {
    public function resetpass() {
        $db_instance = new DB();
        $db = $db_instance->connect();
        $register = new Register($db);
        if (isset($_GET['token'])) {
            $token = $_GET['token'];
            $reset_token = hash("sha256", $token);
            $register->reset_token = $reset_token;
            $user_token = $register->resetPassword();
            // echo var_dump($user_token);
            if (!empty($user_token) || empty($user_token)) {
                if (strtotime($user_token["reset_token_ex"]) <= time()) {
                    die("Token has expired");
                } else {
                    echo "Mã thông báo hợp lệ và chưa hết hạn. Thêm logic đặt lại mật khẩu ở đây.";
                }
            } else {
                die("Token not found");
            }
        } else {
            die("Token not provided");
        }
        include "view/reset-password.php";
        exit();
    }
}