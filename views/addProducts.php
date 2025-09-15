<?php
$title = "Add New Watch";
require_once("../includes/meta.php");
require_once("../includes/admin/adminHeader.php");
require_once("../functions/oldInputs.php");
require_once("../includes/auth.php");
requireRole("admin");
?>
<body class="bg-gray-100 min-h-screen flex flex-col">

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

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Add New Watch</h1>

        <form action="../controllers/addController.php" method="Post" enctype="multipart/form-data" class="bg-white shadow rounded-lg p-8 space-y-6">
            
            <!-- Form Grid: 2 columns on md+ -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Brand Dropdown -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="brand">Brand</label>
                    <select name="brand" id="brand" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                        <option value="">Select Brand</option>
                        <option value="Rolex" <?= old('brand')=='Rolex'?'selected':'' ?>>Rolex</option>
                        <option value="Omega" <?= old('brand')=='Omega'?'selected':'' ?>>Omega</option>
                        <option value="Seiko" <?= old('brand')=='Seiko'?'selected':'' ?>>Seiko</option>
                        <option value="Casio" <?= old('brand')=='Casio'?'selected':'' ?>>Casio</option>
                        <option value="Fossil" <?= old('brand')=='Fossil'?'selected':'' ?>>Fossil</option>
                    </select>
                </div>

                <!-- Model -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="model">Model</label>
                    <input type="text" name="model" id="model" value="<?= old('model')?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                </div>

                <!-- Product Code -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="productcode">Product Code</label>
                    <input type="text" name="productcode" id="productcode" value="<?= old('productcode') ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                </div>

                <!-- Diameter -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="diameter">Diameter</label>
                    <input type="text" name="diameter" id="diameter" value="<?= old('diameter') ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                </div>

                <!-- Type Dropdown -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="type">Type</label>
                    <select name="type" id="type" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                        <option value="">Select Type</option>
                        <option value="Male" <?= old('type')=='Male'?'selected':'' ?>>Male</option>
                        <option value="Female" <?= old('type')=='Female'?'selected':'' ?>>Female</option>
                    </select>
                </div>

                <!-- Material Dropdown -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="material">Material</label>
                    <select name="material" id="material" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                        <option value="">Select Material</option>
                        <option value="Plastic" <?= old('material')=='Plastic'?'selected':'' ?>> Plastic</option>
                        <option value="Steel" <?= old('material')=='Steel'?'selected':'' ?>> Steel</option>
                    </select>
                </div>

                <!-- Strap Dropdown -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="strap">Strap</label>
                    <select name="strap" id="strap" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                        <option value="">Select Strap</option>
                        <option value="Leather" <?= old('strap')=='Leather'?'selected':'' ?>>Leather </option>
                        <option value="Steel" <?= old('strap')=='Steel'?'selected':'' ?>>Steel</option>
                    </select>
                </div>

                <!-- Water Resistance -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="water_resistence">Water Resistence</label>
                    <input type="text" name="water_resistence" id="water_resistence" value= "<?= old('water_resistence') ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                </div>

                <!-- Calibre -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="calibre">Calibre</label>
                    <input type="text" name="calibre" id="calibre" value="<?= old('calibre') ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                </div>

                <!-- Price -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="price">Price</label>
                    <input type="number" name="price" id="price" value="<?= old('price') ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                </div>

                <!-- Quantity -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" value="<?= old('quantity') ?>" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                </div>

                <!-- Image -->
                <div class="md:col-span-2">
                    <label class="block text-gray-700 font-medium mb-2" for="image">Image</label>
                    <input type="file" name="image" id="image" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                </div>

            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="bg-black text-white px-6 py-3 rounded font-semibold hover:bg-gray-800 transition duration-300">Add Watch</button>
            </div>
        </form>
    </main>

    <?php require_once("../includes/dashboardFooter.php"); ?>

</body>
</html>
