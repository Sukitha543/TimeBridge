<?php

$routes = [
    'login' => "../views/login.php",
    'admin_dashboard' => "../controllers/adminDashboardController.php",
    'customer_dashboard' => '../controllers/customerDashboardController.php',
    'customer_register' => '../views/customerRegister.php',
    'admin_register' => '../views/adminRegister.php',
    'add_product' => '../views/addProducts.php',
    'view_product' => '../views/viewProducts.php',
    'manage_product' => '../views/manageProducts.php',
    'checkout' => '../controllers/checkoutController.php',
    'track_order' => '../views/trackOrder.php',
    'manage_order' => "../views/manageOrders.php",
    'manage_customer_details' => "../controllers/manageCustomerController.php",
    'search_customers' => "../views/searchCustomers.php",
    
];


function redirectTo($routeName, $routes) {
    if (isset($routes[$routeName])) {
        header("Location: " . $routes[$routeName]);
        exit;
    } else {
        die("<h1>Route Not Found</h1>");
    }
}

