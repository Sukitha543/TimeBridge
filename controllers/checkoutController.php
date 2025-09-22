<?php
require_once "../includes/auth.php";
require_once("../models/product.php");
require_once("../models/order.php");
require_once ("../routes.php");
requireRole("customer");

$productModel = new Product("","","","","","","","","","","","");
$orderModel = new Order();

// Check if cart is empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    $_SESSION['error'] = "⚠️ No watches have been added to the cart!";
    redirectTo("customer_dashboard", $routes);
    exit;
}

    $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price']; 
        }

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
    $name = trim($_POST['full_name']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $payment_method = $_POST['payment_method'] ?? '';
    $account_number = trim($_POST['account_number']);
    $expiry = trim($_POST['expiry']);
    $cvv = trim($_POST['cvv']);
    $cardholder = trim($_POST['cardholder']);

   // var_dump($name, $address, $city, $payment_method, $account_number, $expiry, $cvv, $cardholder);
//exit;
    if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        $_SESSION['error'] = "Full name must contain only letters and spaces.";
    }
    elseif (!preg_match("/^[a-zA-Z\s]+$/", $city)) {
        $_SESSION['error'] = "City must contain only letters and spaces.";
    }
    elseif (empty($address)) {
        $_SESSION['error'] = "Address is required.";
    }
    elseif (!in_array($payment_method, ['visa', 'master'])) {
        $_SESSION['error'] = "Payment method must be either Visa or Master.";
    }
    elseif (!ctype_digit($account_number)) {
        $_SESSION['error'] = "Account number must contain only numbers.";
    }
    elseif (!preg_match("/^\d{3}$/", $cvv)) {
        $_SESSION['error'] = "CVV must be exactly 3 digits.";
    }
    elseif (empty($expiry) || !strtotime($expiry) || strtotime($expiry) < time()) {
        $_SESSION['error'] = "Expiry date must be valid and in the future.";
    }
    elseif (!preg_match("/^[a-zA-Z\s]+$/", $cardholder)) {
       $_SESSION['error'] = "Cardholder must contain only letters and spaces.";
    }
    else{
         $orderId = $orderModel->createOrder($_SESSION['userid'], $total);
        foreach ($_SESSION['cart'] as $item) {
            $orderModel->addOrderItem($orderId, $item['productcode'], 1, $item['price']);
            $productModel->reduceQuantity($item['productcode'], 1);
     }
        unset($_SESSION['cart']);
        $_SESSION['success'] = "✅ Order made successfully! Thank you for your purchase.";
        redirectTo("customer_dashboard", $routes);
        exit;
    }
}

// If cart has items, load checkout view
require_once ("../views/checkout.php");
