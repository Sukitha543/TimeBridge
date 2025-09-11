<?php

$routes = [
    'login' => "../views/login.php",
    'admin_dashboard' => "../views/admin/dashboard.php",
    'customer_dashboard' => '../views/customer/dashboard.php',
    'customer_register' => '../views/customerRegister.php',
    'admin_register' => '../views/adminRegister.php'
];


function redirectTo($routeName, $routes) {
    if (isset($routes[$routeName])) {
        header("Location: " . $routes[$routeName]);
        exit;
    } else {
        die("<h1>Route Not Fount</h1>");
    }
}