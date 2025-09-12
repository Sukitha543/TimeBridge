<?php
  $title = "Home Page";
  require_once("../includes/header.php");
  
?>
  <!-- Hero Section -->
  <section class="grid grid-cols-1 md:grid-cols-2 items-center px-8 py-12 md:px-16 lg:px-24 gap-8">
    <!-- Left Content -->
    <div>
      <h1 class="text-4xl font-bold mb-4">Find Your Perfect<br>Timepiece Online</h1>
      <p class="text-gray-600 mb-6">
        Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. 
        Elit sunt amet fugiat veniam occaecat fugiat aliqua.
      </p>
      <a href="login.php" class="inline-block bg-black  text-white px-6 py-3 rounded hover:bg-gray-900">
        Login to Browse Our Products
      </a>
    </div>

    <!-- Right Image -->
    <div class="flex justify-center">
      <img src="../src/images/hero.jpg" alt="Luxury Watch" class="rounded-lg shadow-lg max-h-[400px]">
    </div>
  </section>

  <?php
  require_once("../includes/footer.php");
  ?>
</body>
</html>
