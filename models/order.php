<?php
require_once("../models/dbh_config.php");


class Order extends Dbh {

    // Insert a new order and return orderId
    public function createOrder($userId, $total)
    {
        $pdo = $this->connect();
        $stmt = $pdo->prepare("INSERT INTO orders (user_id, total_amount, status) VALUES (?, ?, 'pending')");
        $stmt->execute([$userId, $total]);
        return $pdo->lastInsertId();
    }

    // Insert items for a given order
    public function addOrderItem($orderId, $productCode, $quantity, $price)
    {
        $pdo = $this->connect();
        $stmt = $pdo->prepare("INSERT INTO order_items (order_id, product_code, quantity, price) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$orderId, $productCode, $quantity, $price]);
    }

      public function getUserOrders($userId)
    {
        $pdo = $this->connect();

        // Fetch orders with their items
        $stmt = $pdo->prepare("
            SELECT 
                o.id AS order_id,
                o.order_date,
                o.total_amount,
                o.status,
                oi.product_code,
                oi.quantity,
                oi.price,
                p.brand,
                p.model
            FROM orders o
            INNER JOIN order_items oi ON o.id = oi.order_id
            INNER JOIN products p ON oi.product_code = p.productcode
            WHERE o.user_id = ?
            ORDER BY o.order_date DESC
        ");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

     public function getAllOrders()
    {
        $pdo = $this->connect();
        $stmt = $pdo->query("
            SELECT 
                o.id AS order_id,
                o.user_id,
                o.order_date,
                o.total_amount,
                o.status,
                oi.product_code,
                oi.quantity,
                oi.price,
                p.brand,
                p.model
            FROM orders o
            INNER JOIN order_items oi ON o.id = oi.order_id
            INNER JOIN products p ON oi.product_code = p.productcode
            ORDER BY o.order_date DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update status
    public function updateOrderStatus($orderId, $status)
    {
        $pdo = $this->connect();
        $stmt = $pdo->prepare("UPDATE orders SET status = ? WHERE id = ?");
        return $stmt->execute([$status, $orderId]);
    }

} 