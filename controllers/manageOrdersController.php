<?php
require_once("../models/Order.php");

$orderModel = new Order();

// Handle update request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $orderId = $_POST['order_id'];
    $newStatus = $_POST['status'];

    if ($orderModel->updateOrderStatus($orderId, $newStatus)) {
        $_SESSION['success'] = "✅ Order $orderId status updated successfully.";
    } else {
        $_SESSION['error'] = "⚠️ Failed to update order status.";
    }
    header("Location: manageOrdersController.php");
    exit;
}

// Get all orders
$orders = $orderModel->getAllOrders();

// Group orders by ID
$groupedOrders = [];
foreach ($orders as $row) {
    $groupedOrders[$row['order_id']]['user_id'] = $row['user_id'];
    $groupedOrders[$row['order_id']]['order_date'] = $row['order_date'];
    $groupedOrders[$row['order_id']]['status'] = $row['status'];
    $groupedOrders[$row['order_id']]['total_amount'] = $row['total_amount'];
    $groupedOrders[$row['order_id']]['items'][] = [
        'product_code' => $row['product_code'],
        'brand' => $row['brand'],
        'model' => $row['model'],
        'price' => $row['price'],
        'quantity' => $row['quantity']
    ];
}

require_once "../views/manageOrders.php";
