<?php
namespace controller;
use model\db as DB;
use model\form;
use model\Register;
class Signup{
   public function signup(){
        session_start();

        if (isset($_SESSION["id"])) {
            header("Location:/php2/index.php");
        }
        ob_start();
        $heading='signup';
        include "view/learn/header.php";
        $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
                $db_instance = new DB();
                $db = $db_instance->connect();
        $form = new Form();
        $formBegin =  Form::begin('/php2/signup', 'post','','');
        $formEnd =  Form::end();;
                  
        $register = new Register($db);
        if (isset($_SESSION["id"])) {
            header("Location:/php2/index");
        }
        // $msg = '';
        if (isset($_POST["submit"])) {
            $register->username = $_POST["fullname"];
            $register->password = $_POST["password"]; 
            $register->email = $_POST["email"]; 
            $register->confirmpassword = $_POST["confirmpassword"]; 
            $result = $register -> registration();
            if ($result == 1) {
            echo $msg = '<h3 class="container text-success"> Đăng kí thành công  </h3>';
            // include "view/signup.php";
                // exit();
            }
            else if ($result == 10) {
                echo
                " <script> alert('Already taken')</script>";
            }
            else if  ($result == 100) {
            echo
            " <script> alert('Password does not')</script>";
        }
        }
        include "view/signup.php";
        exit();
    }
}