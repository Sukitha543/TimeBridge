 <!-- Navigation -->
  <?php
  require_once("../includes/meta.php");
  $base_url = "http://localhost/TimeBridge/";
?>
  
  <nav class="bg-black text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex space-x-4">
                    <a href="<?= $base_url ?>controllers/adminDashboardController.php" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-600">Home</a>
                    <a href="<?= $base_url ?>views/addProducts.php" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-600">Add Products</a>
                    <a href="<?= $base_url ?>views/manageProducts.php" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-600">Manage Products</a>
                    <a href="<?= $base_url ?>controllers/productViewController.php"class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-600">View Products</a>
                    <a href="manage_orders.php" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-600">Manage Orders</a>
                    <a href="view_customers.php" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-600">View Customer Details</a>
                 </div>
            </div>
        </div>
    </nav>
