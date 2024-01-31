<?php
namespace controller;
use model\db as DB;
use model\form;
use model\Register;
class Sendpw{
    public function sendpw(){

        session_start();
    
        $heading='Quên mật khẩu';
        if (isset($_SESSION["id"])) {
            header("Location:/php2/index");
        }
        ob_start();
        include_once "vendor/autoload.php";
        include "view/learn/header.php";
                $db_instance = new DB();
                $db = $db_instance->connect();
        $register = new Register($db);
        if (isset($_POST["submit"])) {
            $register->email = $_POST["email"];
            $result = $register->resetpass();
            if ($result) {
                header("Location: /php2/sen-pass-reset");
            }
            
        }
        include "view/forgot-password.php";
        exit();

    }


}