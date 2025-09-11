<?php
session_start();
require_once "../models/dbh_config.php";
require_once "../routes.php";
require_once "../models/admin.php";

// Function to sanitize inputs
function sanitize($data){
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = sanitize($_POST['email']);
    $username = sanitize($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Basic validations
    if(empty($email) || empty($username) || empty($password) || empty($confirm_password)){
        $_SESSION['error'] = "All fields are required!";
        redirectTo('admin_register', $routes);
        exit();
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['error'] = "Invalid email format!";
        redirectTo('admin_register', $routes);
        exit();
    }

    if($password !== $confirm_password){
        $_SESSION['error'] = "Passwords do not match!";
        redirectTo('admin_register', $routes);
        exit();
    }

    if(strlen($password) < 6){
        $_SESSION['error'] = "Password must be at least 6 characters!";
        redirectTo('admin_register', $routes);
        exit();
    }

    // Create Admin object and register
    $admin = new Admin($username, $password, $email);
    $admin->register();

    // Redirect back to form
    redirectTo('admin_register', $routes);
}
