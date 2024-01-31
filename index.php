<?php
// include_once "vendor/autoload.php";
// use model\Router;
//     $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
//         $routes = [
//         '/php2/index.php' => 'controller/home.php',
//         '/php2/shop' => 'view/product.php',
//         '/php2/about' => 'view/about.php',
//         '/php2/login' => 'controller/login.php',
//         '/php2/signup' => 'controller/signup.php',
//         '/php2/logout' => 'controller/logout.php',
//         '/php2/adminproduct' => 'admin/controller/dssp.php',
//         '/php2/addproduct' =>   'admin/controller/addproduct.php',
//         '/php2/deleteProduct' =>   'admin/controller/deleteProduct.php',
//         '/php2/editProduct' =>   'admin/controller/editProduct.php',
//     ];
//         $router = new Router($uri, $routes);

include_once "vendor/autoload.php";
use model\Router as Route;
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
Route::get('/php2/',function(){
    printf('vvvv');
    });
Route::get('/php2/index', ['controller\Home','home']);
Route::get('/php2/shop', 'view/product.php');
Route::get('/php2/about', 'view/about.php');
Route::get('/php2/login', ['controller\Login', 'login']);
Route::post('/php2/login', ['controller\Login', 'login']);
Route::get('/php2/signup', ['controller\Signup', 'signup']);
Route::post('/php2/signup', ['controller\Signup', 'signup']);
Route::get('/php2/logout', ['controller\Logout','logout']);
Route::get('/php2/forgotpassword', ['controller\Sendpw','sendpw']);
Route::post('/php2/send-password-reset', ['controller\sendPasswordreset','sendpasswordreset']);
Route::get('/php2/reset-password', ['controller\resetPass','resetpass']);
Route::get('/php2/processResetPassword', ['controller\processResetPassword','processresetpassword']);
Route::post('/php2/processResetPassword', ['controller\processResetPassword','processresetpassword']);
Route::get('/php2/adminproduct', 'admin/controller/dssp.php');
Route::get('/php2/addproduct', 'admin/controller/addproduct.php');
Route::get('/php2/deleteProduct', 'admin/controller/deleteProduct.php');
Route::get('/php2/editProduct', 'admin/controller/editProduct.php');
// Route::redirect('/php2/index', 'controller/home.php'); 
Route::resolve($uri, $_SERVER['REQUEST_METHOD']);