<?php
session_start();
require_once "../models/dbh_config.php";
require_once "../models/Product.php";
require_once "../functions/oldInputs.php";
require_once "../routes.php";

// sanitize function
function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productCode = sanitize($_POST['productcode']);

    
    if (empty($productCode)) {
        $_SESSION['error'] = "Please enter a product code!";
        clearOldManageInputs();
        redirectTo('manage_product', $routes);
        exit();
    }


    $productModel = new Product('', '', '', '', '', '', '', '', '', '', '', '');
    $product = $productModel->findByCode($productCode);
    if(!$product){
        $_SESSION['error'] = "Product not found!";
        clearOldManageInputs();
        redirectTo('manage_product', $routes);
        exit();
    }

    if ($product) {
        // Save product data in session to populate the form
        $_SESSION['old_manage_product'] = [
            'productcode' => $product['productcode'],
            'brand' => $product['brand'],
            'model' => $product['model'],
            'diameter' => $product['diameter'],
            'type' => $product['type'],
            'material' => $product['material'],
            'strap' => $product['strap'],
            'water_resistence' => $product['water_resistence'],
            'calibre' => $product['calibre'],
            'price' => $product['price'],
            'quantity' => $product['quantity'],
            'image' => $product['image'],
        ];
    }

    redirectTo('manage_product', $routes);
    exit();
}
