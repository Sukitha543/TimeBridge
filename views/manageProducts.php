<?php
$title = "Manage Products";
require_once("../includes/admin/adminHeader.php");
require_once("../functions/oldInputs.php");
require_once("../includes/auth.php");
requireRole("admin");
?>

<!-- Messages -->
<div class="container mx-auto px-4 mt-6">
    <?php if(isset($_SESSION['error'])): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
            <span class="block sm:inline"><?= $_SESSION['error']; ?></span>
            <?php unset($_SESSION['error']); ?>
        </div>
    <?php elseif(isset($_SESSION['success'])): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
            <span class="block sm:inline"><?= $_SESSION['success']; ?></span>
            <?php unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>
</div>

<main class="flex-grow container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Manage Watch</h1>

    <!-- Search Form -->
    <form method="POST" action="../controllers/searchController.php" class="flex gap-6 mb-6">
        <input type="text" name="productcode" placeholder="Enter Product Code"
               class="border border-gray-300 rounded px-8 py-2 focus:outline-none focus:ring-2 focus:ring-black">
        <button type="submit" class="bg-black text-white px-6 py-2 rounded hover:bg-gray-800">Search</button>
    </form>

    <!-- Product Form -->
    <form action="../controllers/updateDeleteController.php" method="POST" enctype="multipart/form-data"  class="bg-white shadow rounded-lg p-8 space-y-6">
       <input type="hidden" name="productcode" value="<?= old_manage('productcode') ?>">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Brand -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Brand</label>
                <select name="brand" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                    <option value="">Select Brand</option>
                    <?php 
                    $brands = ['Rolex','Omega','Seiko','Casio','Fossil'];
                    foreach ($brands as $b):
                        $selected = old_manage('brand') === $b ? 'selected' : '';
                    ?>
                        <option value="<?= $b ?>" <?= $selected ?>><?= $b ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Model -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Model</label>
                <input type="text" name="model" value="<?= old_manage('model') ?>" 
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
            </div>

            <!-- Diameter -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Diameter</label>
                <input type="text" name="diameter" value="<?= old_manage('diameter') ?>"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
            </div>

            <!-- Type -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Type</label>
                <select name="type" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                    <option value="">Select Type</option>
                    <?php
                    $types = ['Male','Female'];
                    foreach($types as $t):
                        $selected = old_manage('type') === $t ? 'selected' : '';
                    ?>
                        <option value="<?= $t ?>" <?= $selected ?>><?= $t ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Material -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Material</label>
                <select name="material" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                    <option value="">Select Material</option>
                    <?php
                    $materials = ['Plastic','Steel'];
                    foreach($materials as $m):
                        $selected = old_manage('material') === $m ? 'selected' : '';
                    ?>
                        <option value="<?= $m ?>" <?= $selected ?>><?= $m ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Strap -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Strap</label>
                <select name="strap" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                    <option value="">Select Strap</option>
                    <?php
                    $straps = ['Leather','Steel'];
                    foreach($straps as $s):
                        $selected = old_manage('strap') === $s ? 'selected' : '';
                    ?>
                        <option value="<?= $s ?>" <?= $selected ?>><?= $s ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Water Resistance -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Water Resistance</label>
                <input type="text" name="water_resistence" value="<?= old_manage('water_resistence') ?>"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
            </div>

            <!-- Calibre -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Calibre</label>
                <input type="text" name="calibre" value="<?= old_manage('calibre') ?>"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
            </div>

            <!-- Price -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Price</label>
                <input type="number" name="price" value="<?= old_manage('price') ?>"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
            </div>

            <!-- Image -->
            <div class="md:col-span-2">
                <label class="block text-gray-700 font-medium mb-2">Image</label>
                <input type="file" name="image" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                <?php if(old_manage('image')): ?>
                    <img src="../<?= old_manage('image') ?>" class="mt-2 h-32 w-32 object-cover rounded" alt="Product Image">
                <?php endif; ?>
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex justify-end gap-8">
            <button type="submit" name="action" value="update"  class="bg-black text-white px-6 py-3 rounded font-semibold hover:bg-gray-900 transition duration-300">Update</button>
            <button type="submit" name="action" value="delete" class="bg-red-600 text-white px-6 py-3 rounded font-semibold hover:bg-red-800 transition duration-300">Delete</button>
        </div>
    </form>
</main>
<script>
<?php
require_once("../includes/dashboardFooter.php");
?>
