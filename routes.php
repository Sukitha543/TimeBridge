<?php

$routes = [
    'login' => "../views/login.php",
    'admin_dashboard' => "../views/dashboard.php",
    'customer_dashboard' => '../views/customerDashboard.php',
    'customer_register' => '../views/customerRegister.php',
    'admin_register' => '../views/adminRegister.php',
    'add_product' => '../views/addProducts.php',
    'view_product' => '../views/viewProducts.php',
    'manage_product' => '../views/manageProducts.php',
    'checkout' => '../controllers/checkoutController.php',
    
];


function redirectTo($routeName, $routes) {
    if (isset($routes[$routeName])) {
        header("Location: " . $routes[$routeName]);
        exit;
    } else {
        die("<h1>Route Not Found</h1>");
    }
}

