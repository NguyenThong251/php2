<?php
namespace controller;

use model\db as DB;
use model\form;
use model\Register;
class Login{

public function login(){


    session_start();
    
    $heading='Login';
    if (isset($_SESSION["id"])) {
        header("Location:/php2/index");
    }
    ob_start();
    include_once "vendor/autoload.php";
    include "view/learn/header.php";
            $db_instance = new DB();
            $db = $db_instance->connect();
    $form = new Form();
                $formBegin =  Form::begin('/php2/login', 'post','','');
                $formEnd =  Form::end();;
    // -------
    
    $register = new Register($db);
    if (isset($_POST["submit"])) {
        $register -> email =$_POST["email"];
        $register -> password =$_POST["password"];
        $result = $register -> login();
        echo var_dump($result);
    if ($result == 1) {
        $_SESSION["login"] = true;
        $_SESSION["id"] = $register->idUser();
        header("Location:/php2/index");
        exit();
        // echo
        // " <script> alert('success')</script>";
    }
    else if ($result == 10) {
        // echo
        // " <script> alert('Wrong password')</script>";
    }
    else if  ($result == 100) {
        echo
        " <script> alert('User not found')</script>";
    }
    }
    if (isset($_SESSION['reset_password_success']) && ($_SESSION['reset_password_success'] != "")) {
        echo '<p class="container text-success">' . $_SESSION['reset_password_success'] . '</p>';
        // unset($_SESSION['reset_password_success']);
        }
    include "view/login.php";
    exit();
}

}