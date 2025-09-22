<?php
$title = "Track Orders";
require_once("../includes/auth.php");
requireRole("customer");
?>

<body class="bg-gray-100 text-gray-800 flex flex-col min-h-screen">
    <?php require_once ("../includes/customer/customerHeader.php"); ?>
<main class="container mx-auto px-4 py-8">
     <h1 class="text-3xl font-bold mb-6">Your Orders</h1>
     <?php if (empty($groupedOrders)): ?>
        <div class="p-6 text-4xl text-center font-bold">
            ⚠️ No orders to display.
        </div>
    <?php else: ?>
        <?php foreach ($groupedOrders as $orderId => $order): ?>
            <div class="bg-white shadow rounded-lg p-6 mb-6">
                <div class="flex justify-between items-center border-b pb-2 mb-4">
                    <h2 class="text-xl font-semibold">Order #<?= $orderId ?></h2>
                    <span class="text-sm text-gray-600"><?= date("F j, Y, g:i a", strtotime($order['order_date'])) ?></span>
                </div>
                <p class="mb-2"><strong>Status:</strong> <span class="text-blue-600"><?= htmlspecialchars($order['status']) ?></span></p>
                <table class="w-full text-center mb-4 border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2">Brand</th>
                            <th class="py-2">Model</th>
                            <th class="py-2">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order['items'] as $item): ?>
                            <tr class="border-b">
                                <td class="py-2"><?= htmlspecialchars($item['brand']) ?></td>
                                <td class="py-2"><?= htmlspecialchars($item['model']) ?></td>
                                <td class="py-2">$<?= number_format($item['price'], 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <p class="text-right font-bold text-lg">Total: $<?= number_format($order['total_amount'], 2) ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</main>
<script src="../script/script.js"></script> 
</body>
<?php require_once("../includes/customer/customerFooter.php");
