<?php
require_once "../includes/auth.php";
require_once("../routes.php");
require_once "../models/Customer.php";
requireRole("customer");

$customerModel = new Customer("","","","","","","");
$userId = $_SESSION['userid'];
$customer = $customerModel->getCustomerById($userId);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['save_profile'])) {
        $firstName = trim($_POST['first_name']);
        $lastName = trim($_POST['last_name']);
        $email = trim($_POST['email_address']);
        $shipping = trim($_POST['shipping_address']);
        $phone = trim($_POST['phone_number']);

        $customerModel->updateCustomer($userId, $firstName, $lastName, $email, $shipping, $phone);
        redirectTo("manage_customer_details", $routes);
        exit;
    }

    if (isset($_POST['delete_profile'])) {
        // Check for confirmation
        if (isset($_POST['confirm_delete']) && $_POST['confirm_delete'] === 'yes') {
            if ($customerModel->deleteCustomer($userId)) {
                $_SESSION['success'] = "✅ Account deleted successfully!";
                redirectTo("login", $routes);
                exit;
            }
        } else {
            $_SESSION['error'] = "⚠️ You must confirm deletion!";
            redirectTo("manage_customer_details", $routes);
            exit;
        }
    }
}


require_once "../views/manageCustomerDetails.php";
