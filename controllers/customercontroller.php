<?php
session_start();
require_once "../models/dbh_config.php";
require_once "../routes.php";
require_once "../models/customer.php";

// Function to sanitize inputs
function sanitize($data){
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = sanitize($_POST['firstName']);
    $lastName = sanitize($_POST['lastName']);
    $email = sanitize($_POST['email']);
    $shippingAddress = sanitize($_POST['address']);
    $contactNumber = sanitize($_POST['contact']);
    $username = sanitize($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];

    // Basic validations
    if(empty($firstName) || empty($lastName) || empty($email) || empty($shippingAddress) || empty($contactNumber) || empty($username) || empty($password) || empty($confirm_password)){
        $_SESSION['error'] = "All fields are required!";
        redirectTo('customer_register', $routes);
        exit();
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['error'] = "Invalid email format!";
        redirectTo('customer_register', $routes);
        exit();
    }

    if($password !== $confirm_password){
        $_SESSION['error'] = "Passwords do not match!";
        redirectTo('customer_register', $routes);
        exit();
    }

    if(strlen($password) < 6){
        $_SESSION['error'] = "Password must be at least 6 characters!";
        redirectTo('customer_register', $routes);
        exit();
    }

    // Create Customer object and register
    $customer = new Customer($firstName, $lastName, $email, $shippingAddress, $contactNumber, $username, $password);
    $customer->register();

    redirectTo('customer_register', $routes);
}
