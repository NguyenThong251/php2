<?php

// include_once __DIR__ . "/vendor/autoload.php";
// use model\db as DB;
// use model\product;
// use model\ProductHelper;
// use model\Register;
// session_start();
// ob_start();
// $heading ="Home";



// $db_instance = new DB();
// $db = $db_instance->connect();
// $select = new Register($db);
// if (isset($_SESSION["id"])) {
//     $user =  $select -> selectUser($_SESSION["id"]);
    
    
// }
// include "view/learn/header.php";
// include "view/learn/nav.php";
//         // include "View/global.php";
// // include_once "./model/pdo.php";
// // include_once "./model/product.php";
// $productModel = new product($db);
// $html_product_all = ProductHelper::showProducts($productModel, 8);
// $html_product_sale = ProductHelper::showSaleProducts($productModel, 4);
// $html_product_hot = ProductHelper::showHotProducts($productModel, 4);
// $html_product_view = ProductHelper::showViewProducts($productModel, 4);

// include "view/home.php";
// include "view/learn/footer.php";

// ------
namespace controller;

use model\db as DB;
use model\product;
use model\ProductHelper;
use model\Register;

class Home
{
    public function home()
    {
        // Check if session is already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Check if output buffer is already started
        if (ob_get_level() == 0) {
            ob_start();
        }

        $heading = "Home";

        $db_instance = new DB();
        $db = $db_instance->connect();
        $select = new Register($db);
        $register = new Register($db);
        if (isset($_SESSION["id"])) {
            $register -> id =$_SESSION["id"];
            $user = $register-> selectUser();
        }

        include "view/learn/header.php";
        include "view/learn/nav.php";

        $productModel = new product($db);
        $html_product_all = ProductHelper::showProducts($productModel, 8);
        $html_product_sale = ProductHelper::showSaleProducts($productModel, 4);
        $html_product_hot = ProductHelper::showHotProducts($productModel, 4);
        $html_product_view = ProductHelper::showViewProducts($productModel, 4);

        include "view/home.php";
        include "view/learn/footer.php";
        exit();
    }
}