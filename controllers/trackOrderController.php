<?php
require_once "../includes/auth.php";
require_once("../models/Order.php");
requireRole("customer");

$orderModel = new Order();
$userId = $_SESSION['userid'];

$orders = $orderModel->getUserOrders($userId);

// Group items by order_id
$groupedOrders = [];
foreach ($orders as $row) {
    $groupedOrders[$row['order_id']]['order_date'] = $row['order_date'];
    $groupedOrders[$row['order_id']]['status'] = $row['status'];
    $groupedOrders[$row['order_id']]['total_amount'] = $row['total_amount'];
    $groupedOrders[$row['order_id']]['items'][] = [
        'brand' => $row['brand'],
        'model' => $row['model'],
        'price' => $row['price'],
        'quantity' => $row['quantity']
    ];
}


// Load view
require_once "../views/trackOrder.php";
