<?php
$title ="Admin Dashboard";
require_once("../includes/auth.php");
require_once("../controllers/adminDashboardController.php");
requireRole("admin");
?>
<body class="bg-gray-100 min-h-screen flex flex-col">
 <?php require_once ("../includes/admin/adminHeader.php"); ?>
    <!-- Main Content -->
<main class="flex-grow container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Welcome <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
        <!-- Number of Users -->
        <div class="bg-white shadow rounded-lg p-6 hover:shadow-lg transition duration-300">
            <h2 class="text-xl font-semibold mb-2">Number of Users</h2>
            <p class="text-3xl font-bold text-blue-600"><?= htmlspecialchars($customerCount) ?></p>
        </div>

        <!-- Number of Products -->
        <div class="bg-white shadow rounded-lg p-6 hover:shadow-lg transition duration-300">
            <h2 class="text-xl font-semibold mb-2">Number of Products</h2>
            <p class="text-3xl font-bold text-green-600"> <?= htmlspecialchars($productCount) ?></p>
        </div>

        <!-- Total Sales -->
        <div class="bg-white shadow rounded-lg p-6 hover:shadow-lg transition duration-300">
            <h2 class="text-xl font-semibold mb-2">Total Sales</h2>
            <p class="text-3xl font-bold text-purple-600">$12,345.67</p>
        </div>
    </div>
</main>
    <?php
    require_once "../includes/dashboardFooter.php"; 
    ?>
  

</body>
</html>
