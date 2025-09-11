<?php
session_start();
require_once "../models/dbh_config.php";
require_once "../routes.php";
require_once "../models/login.php";

function sanitize($data){
    return htmlspecialchars(stripslashes(trim($data)));
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = sanitize($_POST['username']);
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
        $_SESSION['error'] = "All fields are required!";
        redirectTo('login', $routes);
        exit();
    }

    $login = new Login();
    $authenticated = $login->authenticate($username, $password);

    if($authenticated){
        // Redirect to correct dashboard
        if($_SESSION['role'] === "admin"){
           redirectTo('admin_dashboard', $routes);
        } else {
            redirectTo('customer_dashboard', $routes);
        }
        exit();
    } else {
        redirectTo('login', $routes);
        exit();
    }
}
