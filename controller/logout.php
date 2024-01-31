<?php
namespace controller;
session_start();
use model\db as DB;
class Logout{
    public function logout(){
        //   include_once "vendor/autoload.php";
        $db_instance = new DB();
        $db = $db_instance->connect();
        if (isset($_SESSION)) {
            // Xóa tất cả các biến session
            $_SESSION = [];
        
            // Hủy session
            session_unset();
            session_destroy();
        }
        header("Location: /php2/index");
        
   }
}