<?php
$heading="Chỉnh sửa sản phẩm";
include_once "vendor/autoload.php";
use model\db as DB;
use model\product;
$db_instance = new DB();
$db = $db_instance->connect();

$productModel = new product($db);
$id = isset($_GET['id']) ? $_GET['id'] : null;
if (isset($_POST['editproduct'])) {
    $name = $_POST['productName'];
    $price = $_POST['productPrice'];
    $iddm = $_POST['danhmuc'];
    $img = $_FILES['productImg']['name'];
    $id = $_POST['id'];
    move_uploaded_file($_FILES['productImg']['tmp_name'], './img/' . $img);
    // echo var_dump($name,$price,$img,$iddm,$id);
    $productModel->name = $name;
    $productModel->price = $price;
    $productModel->img = $img;
    $productModel->iddm = $iddm;
    $productModel->id = $id;
    $CreateProduct = $productModel->update();
    // $UpdateProduct = $productModel -> update($name,$price,$img,$iddm,$id);
    if ($UpdateProduct) {
        // Update successful, redirect to dssp with success message
        header("Location: /php2/adminproduct?successProduct=0");
        exit();
    } else {
        // Update failed, redirect to dssp with error message
        header("Location: /php2/adminproduct?successProduct=1");
        exit();
    }
}
include_once 'admin/view/component/header.php';
include_once 'admin/view/updateProduct.php';
include_once 'admin/view/component/footer.php';
?>