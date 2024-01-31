<?php
$heading = "Trang thêm sản phẩm";
include_once "vendor/autoload.php";
use model\db as DB;
use model\product;

$db_instance = new DB();
$db = $db_instance->connect();

$productModel = new product($db);
if (isset($_POST['addproduct'])) {
    $name = $_POST['productName'];
    $price = $_POST['productPrice'];
    $iddm = $_POST['danhmuc'];
    $img = $_POST['productImg'];
    // echo var_dump($name,$price,$img,$iddm);
    $productModel->name = $name;
    $productModel->price = $price;
    $productModel->img = $img;
    $productModel->iddm = $iddm;
    $CreateProduct = $productModel->create();
    // $CreateProduct = $productModel -> create($name,$price,$img,$iddm);
    if ($UpdateProduct ==null) {
        // Update successful, redirect to dssp with success message
        header("Location: /php2/adminproduct?successCreate=1");
        exit();
    } else {
        // Update failed, redirect to dssp with error message
        header("Location: /php2/adminproduct?successCreate=0");
        exit();
    }
} 
//else {
//     header("Location: /php2/adminproduct?success=0");
//     exit();
//}

include_once 'admin/view/component/header.php';
include_once 'admin/view/addproduct.php';
include_once 'admin/view/component/footer.php';