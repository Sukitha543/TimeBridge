<?php
require_once "../models/Product.php";
require_once "../routes.php";


$productModel = new Product('', '', '', '', '', '', '', '', '', '', '', '');
$products = $productModel->getAllProducts();

if (empty($products)) {
    $_SESSION['error'] = "No products found!";
}
// Load the view
require_once "../views/viewProducts.php";
