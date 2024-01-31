<?php
$heading = "Quản lí sản phẩm";
 include_once "vendor/autoload.php";
 use model\db as DB;
 use model\product;
 use model\ProductHelper;
 
 
 $db_instance = new DB();
 $db = $db_instance->connect();
include_once 'admin/view/component/header.php';
$productModel = new product($db);
$success = isset($_GET['success']) ? $_GET['success'] : null;
$successProduct = isset($_GET['successProduct']) ? $_GET['successProduct'] : null;
$successCreate = isset($_GET['successCreate']) ? $_GET['successCreate'] : null;

$message = '';

if ($success === '1') {
    $message = 'Product deleted successfully!';
} elseif ($success === '0') {
    $message = 'Failed to delete product.';
}
if ($successProduct === '1') {
    $message = 'Product update successfully!';
} elseif ($successProduct === '0') {
    $message = 'Failed to update product.';
}
if ($successCreate === '1') {
    $message = 'Product update successfully!';
} elseif ($successCreate === '0') {
    $message = 'Failed to update product.';
}

// Create product 
// $CreateProduct = $productModel -> create($name,$price,$img,$iddm);
// $CreateProduct = $productModel -> create("a","a","a","1");
// Update product 
// $UpdateProduct = $productModel -> update($name,$price,$img,$iddm,$id);
// Detele product
// $DeleteProduct = $productModel -> delete($id);
// $CreateProduct = $productModel -> create("a","a","a","1");
$html_allProduct_admin = ProductHelper::showAllProduct($productModel);
include_once 'admin/view/dssp.php';
include_once 'admin/view/component/footer.php';