<?php
require_once("../includes/auth.php");
require_once("../controllers/customerDashboardController.php");
$title ="Customer Dashboard";
requireRole("customer");
?>
<body class="bg-gray-100 text-gray-800 flex flex-col min-h-screen">
    <?php require_once ("../includes/customer/customerHeader.php"); ?>

    <main class="container mx-auto px-4 py-8 flex-grow">
        <h1 class="text-2xl font-semibold mb-8">
            Welcome Customer <?= htmlspecialchars($_SESSION['username']); ?>
        </h1>
                <!-- Flash Messages -->
        <?php if (isset($_SESSION['error'])): ?>
            <div class="mb-6 p-4 text-red-700 bg-red-100 rounded-lg border border-red-300">
                <?= $_SESSION['error']; ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="mb-6 p-4 text-green-700 bg-green-100 rounded-lg border border-green-300">
                <?= $_SESSION['success']; ?>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
        <?php if (empty($products)): ?>
            <p class="text-red-600 text-lg">No products found!</p>
        <?php else: ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <?php foreach ($products as $product): ?>
                    <div class="bg-white shadow-lg rounded-xl p-6 flex flex-col items-center text-center border border-gray-200 hover:shadow-2xl transition duration-300">
                        <!-- Product Image -->
                        <img src="../<?= htmlspecialchars($product['image']) ?>" 
                             alt="<?= htmlspecialchars($product['brand']) ?>" 
                             class="w-48 h-48 object-contain mb-4 rounded-lg">

                        <!-- Product Info -->
                        <h3 class="text-2xl font-bold mb-1"><?= htmlspecialchars($product['brand']) ?> - <?= htmlspecialchars($product['model']) ?></h3>
                        <p class="text-lg text-gray-600 mb-2" hidden><strong>Product Code:</strong> <?= htmlspecialchars($product['productcode']) ?></p>
                        <p class="text-lg text-gray-600 mb-2"><strong>Type:</strong> <?= htmlspecialchars($product['type']) ?></p>
                        <p class="text-lg text-gray-600 mb-2"><strong>Diameter:</strong> <?= htmlspecialchars($product['diameter']) ?></p>
                        <p class="text-lg text-gray-600 mb-2"><strong>Material:</strong> <?= htmlspecialchars($product['material']) ?></p>
                        <p class="text-lg text-gray-600 mb-2"><strong>Strap:</strong> <?= htmlspecialchars($product['strap']) ?></p>
                        <p class="text-lg text-gray-600 mb-2"><strong>Water Resistence:</strong> <?= htmlspecialchars($product['water_resistence']) ?></p>
                        <p class="text-lg text-gray-600 mb-2"><strong>Calibre:</strong> <?= htmlspecialchars($product['calibre']) ?></p>
                        <!-- Price -->
                        <p class="text-xl font-bold text-gray-900 mb-4">Rs <?= number_format($product['price'], 2) ?></p>

                        <!-- Add to Cart Button -->
                       <!-- Add to Cart Form -->
                    <form action="../controllers/cartController.php" method="POST" class="w-full">
                        <input type="hidden" name="productcode" value="<?= htmlspecialchars($product['productcode']) ?>">
                        <input type="hidden" name="image" value="<?= htmlspecialchars($product['image']) ?>">
                        <input type="hidden" name="brand" value="<?= htmlspecialchars($product['brand']) ?>">
                        <input type="hidden" name="model" value="<?= htmlspecialchars($product['model']) ?>">
                        <input type="hidden" name="price" value="<?= htmlspecialchars($product['price']) ?>">

                        <button type="submit" name="add_to_cart" 
                                class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-900 transition-colors font-semibold w-full">
                            Add to Cart
                        </button>
                    </form>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>
    <?php require_once("../includes/customer/customerFooter.php"); ?>
</body>
</html>  
</body>
</html>
