<?php
require_once("../routes.php");
session_start();


// If cart doesn’t exist, create it
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// ADD TO CART
if (isset($_POST['add_to_cart'])) {
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    // Unique key (brand + model)
    $productKey = $brand . '_' . $model;

    if (isset($_SESSION['cart'][$productKey])) {
        $_SESSION['error'] = "⚠️ This watch is already in your cart!";
    } else {
        $_SESSION['cart'][$productKey] = [
            "brand" => $brand,
            "model" => $model,
            "price" => $price,
            "image" => $image
        ];
        $_SESSION['success'] = "✅ Watch added to cart!";
    }

    redirectTo("customer_dashboard", $routes);
    exit;
}


// REMOVE FROM CART
if (isset($_GET['remove'])) {
    $key = $_GET['remove'];
    unset($_SESSION['cart'][$key]);
    redirectTo("checkout", $routes);
    exit;
}
