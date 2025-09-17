<?php
$title = "Products - TimeBridge";
require_once("../includes/admin/adminHeader.php");
?>
<body class="bg-gray-100 min-h-screen flex flex-col">
<main class="flex-grow p-8">
    <h1 class="text-3xl font-bold mb-6">Available Products</h1>

    <?php if(isset($_SESSION['error'])): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $p): ?>
                <div class="bg-white shadow-md rounded-lg p-4">
                    <img src="../uploads/<?= htmlspecialchars($p['image']); ?>" 
                         alt="<?= htmlspecialchars($p['brand']); ?>" 
                         class="w-full h-40 object-cover rounded-md mb-4">
                    <h2 class="text-xl font-semibold"><?= htmlspecialchars($p['brand']); ?></h2>
                    <p class="text-gray-600"><?= htmlspecialchars($p['model']); ?></p>
                    <p class="text-gray-500 text-sm">Code: <?= htmlspecialchars($p['productCode']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>
</body>
</html>

    <?php
    require_once("../includes/dashboardFooter.php");
    ?>
</body>
 </html>
