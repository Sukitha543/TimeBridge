<?php
require_once("../includes/meta.php");
$base_url = "http://localhost/TimeBridge/";
?>
<body class= "font-family-heading color-gray-600">
<header class="flex items-center justify-between px-6 py-4 shadow-sm bg-black">
  <div class="flex items-center space-x-10">
    <img src="../src/images/logo.png" alt="TimeBridge Logo" class="h-20 w-auto">
    <nav>
      <ul class="flex space-x-8 text-white font-medium">
         <a href="<?= $base_url ?>controllers/customerDashboardController.php">Home</a>
        <li><a href="">Track Order</a></li>
        <li><a href="">Logout</a></li>
      </ul>
    </nav>
  </div>
  <div class="flex items-center space-x-4">
            <a href="<?= $base_url?>controllers/checkoutController.php"><i class="fa-solid fa-cart-plus text-white text-3xl"  ></i></a>
            <a href="#"><i class="fa-solid fa-user text-white text-3xl"></i></a>
        </div>
    </header>

        