<?php
namespace model;

class ProductHelper {
    public static function showProducts($productModel, $limit) {
        $products = $productModel->getAllProducts($limit);
        return $productModel->show_product($products);
    }

    public static function showSaleProducts($productModel, $limit) {
        $products = $productModel->get_product_sale($limit);
        return $productModel->show_product($products);
    }

    public static function showHotProducts($productModel, $limit) {
        $products = $productModel->get_product_hot($limit);
        return $productModel->show_product($products);
    }

    public static function showViewProducts($productModel, $limit) {
        $products = $productModel->get_product_view($limit);
        return $productModel->show_product($products);
    }
    public static function showAllProduct($productModel){
        $products = $productModel->AllProducts();
        return  $productModel->product_admin($products);
    }
}