<?php
$title = "Manage Orders";
require_once("../includes/auth.php");
requireRole("admin");
?>

<body class="bg-gray-100 min-h-screen flex flex-col">
    <?php require_once("../includes/admin/adminHeader.php");?>
<main class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Manage Customer Orders</h1>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="bg-green-100 text-green-800 p-3 mb-4 rounded">
            <?= $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
    <?php elseif (isset($_SESSION['error'])): ?>
        <div class="bg-red-100 text-red-800 p-3 mb-4 rounded">
            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <?php if (empty($groupedOrders)): ?>
        <div class="p-6 bg-yellow-100 text-yellow-800 rounded-lg">
            ⚠️ No orders found.
        </div>
    <?php else: ?>
        <?php foreach ($groupedOrders as $orderId => $order): ?>
            <div class="bg-white shadow rounded-lg p-6 mb-6">
                <div class="flex justify-between items-center border-b pb-2 mb-4">
                    <h2 class="text-xl font-semibold">Order #<?= $orderId ?> (Customer ID: <?= $order['user_id'] ?>)</h2>
                    <span class="text-sm text-gray-600"><?= date("F j, Y, g:i a", strtotime($order['order_date'])) ?></span>
                </div>

                <table class="w-full text-center mb-4 border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2">Product ID</th>
                            <th class="py-2">Brand</th>
                            <th class="py-2">Model</th>
                            <th class="py-2">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order['items'] as $item): ?>
                            <tr class="border-b">
                                <td class="py-2"><?= htmlspecialchars($item['product_code']) ?></td>
                                <td class="py-2"><?= htmlspecialchars($item['brand']) ?></td>
                                <td class="py-2"><?= htmlspecialchars($item['model']) ?></td>
                                <td class="py-2">$<?= number_format($item['price'], 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="flex justify-between items-center gap-2">
                    <p class="font-bold text-lg">Total: $<?= number_format($order['total_amount'], 2) ?></p>
                    
                    <form method="POST" action="../controllers/manageOrdersController.php" class="flex items-center gap-4">
                        <input type="hidden" name="order_id" value="<?= $orderId ?>">
                        <select name="status" class="border px-3 py-2 rounded gap-2">
                            <option value="pending" <?= $order['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="processing" <?= $order['status'] === 'processing' ? 'selected' : '' ?>>Processing</option>
                            <option value="completed" <?= $order['status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
                            <option value="cancelled" <?= $order['status'] === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                        </select>
                        <button type="submit" name="update_status" class="bg-black text-white px-4 py-2 rounded gap-4">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</main>
<script src="../script/script.js"></script> 
 <?php require_once("../includes/dashboardFooter.php");?>
</body>
</html>



