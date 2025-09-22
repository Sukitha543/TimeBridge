<?php
require_once("../includes/auth.php");
require_once("../models/Customer.php");
require_once("../routes.php");
requireRole("admin"); 

$customerModel = new Customer("", "", "", "", "", "", ""); 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['get_customer'])) {
    $customerId = trim($_POST['customer_id']);

    $customerDetails = $customerModel->getCustomerById($customerId);

    if ($customerDetails) {
        $_SESSION['customer_details'] = $customerDetails;
    } else {
        $_SESSION['error'] = "No customer found with ID {$customerId}.";
    }

    // Redirect back to view
    redirectTo("search_customers", $routes);
    exit;
}
