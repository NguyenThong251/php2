<?php
include_once "vendor/autoload.php";
use model\db as DB;
use model\product;

$db_instance = new DB();
$db = $db_instance->connect();

$productModel = new product($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $productModel->id = $id;
    $result = $productModel->delete();
    // $result = $productModel->delete($id);
    if ($result == null) {
        header("Location: /php2/adminproduct?success=0");
        exit();
    } else {
        header("Location: /php2/adminproduct?success=1");
        exit();
    }
} 
//else {
//     header("Location: /php2/adminproduct?success=0");
//     exit();
//}
?>