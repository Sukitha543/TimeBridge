<?php
$title = "View Products";
require_once("../includes/admin/adminHeader.php");
require_once("../controllers/productViewController.php");
require_once("../includes/auth.php");
requireRole("admin");
?>

<body class="bg-gray-100 min-h-screen flex flex-col">
<div class="container mx-auto px-4 mt-6">
    <!-- Show error or success -->
    <?php if (isset($_SESSION['error'])): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <?= $_SESSION['error']; ?>
            <?php unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <h1 class="text-3xl font-bold text-gray-900 mb-6">All Products</h1>

    <?php if (!empty($products)): ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($products as $product): ?>
                <div class="bg-white shadow-md rounded-lg p-4">
                    <?php if (!empty($product['image'])): ?>
                        <img src="../<?= htmlspecialchars($product['image']) ?>" 
                             alt="<?= htmlspecialchars($product['model']) ?>" 
                             class="h-40 w-full object-cover rounded mb-4">
                    <?php endif; ?>

                    <h2 class="font-bold text-lg"><?= htmlspecialchars($product['brand']) ?> - <?= htmlspecialchars($product['model']) ?></h2>
                    <p class="text-gray-700">Product Code: <?= htmlspecialchars($product['productcode']) ?></p>
                    <p class="text-gray-700">Price: $<?= htmlspecialchars($product['price']) ?></p>
                    <p class="text-gray-700">Quantity: <?= htmlspecialchars($product['quantity']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded">
            No products available.
        </div>
    <?php endif; ?>
</div>
<script src="../script/script.js"></script> 
</body>
<?php require_once("../includes/dashboardFooter.php"); ?>
</html>


