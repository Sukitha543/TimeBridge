<?php
require_once "../includes/auth.php";
require_once ("../routes.php");
requireRole("customer");


// Check if cart is empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    $_SESSION['error'] = "⚠️ No watches have been added to the cart!";
    redirectTo("customer_dashboard", $routes);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
    $full_name = trim($_POST['full_name']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $payment_method = $_POST['payment_method'] ?? '';
    $bank_name = trim($_POST['bank_name']);
    $account_number = trim($_POST['account_number']);

    $errors = [];

    // Validate fields
    if ($full_name === '') $errors['full_name'] = "Full name is required.";
    if ($address === '') $errors['address'] = "Address is required.";
    if ($city === '') $errors['city'] = "City is required.";
    if ($payment_method === '') $errors['payment_method'] = "Please select a payment method.";
    if ($bank_name === '') $errors['bank_name'] = "Bank name is required.";
    if ($account_number === '') $errors['account_number'] = "Account number is required.";

    if (!empty($errors)) {
        // Store errors + sticky form values
        $_SESSION['checkout_errors'] = $errors;
        $_SESSION['checkout_data'] = $_POST;
        redirectTo("checkout", $routes);
        exit;
    }

    // Step 2 – Ask for confirmation before finalizing
    $_SESSION['confirm_checkout'] = true;
    $_SESSION['checkout_data'] = $_POST;
    redirectTo("checkout", $routes);
    exit;
}

// If user confirms payment
if (isset($_POST['confirm_payment'])) {
    // Clear cart + checkout form
    unset($_SESSION['cart']);
    unset($_SESSION['checkout_data']);
    unset($_SESSION['confirm_checkout']);

    $_SESSION['success'] = "✅ Payment confirmed successfully!";
    redirectTo("customer_dashboard", $routes);
    exit;
}

// If user cancels confirmation
if (isset($_POST['cancel_payment'])) {
    unset($_SESSION['confirm_checkout']);
    $_SESSION['error'] = "⚠️ Payment was cancelled!";
    redirectTo("checkout", $routes);
    exit;
}

// If cart has items, load checkout view
require_once "../views/checkout.php";
