<?php
   $title = "AboutUs";
   require_once("../includes/header.php");
?>
    <section class="flex flex-col lg:flex-row items-center lg:items-start p-8 lg:p-16">
        <div class="lg:w-1/2 mb-8 lg:mb-0 lg:pr-12">
            <h1 class="text-4xl lg:text-5xl font-bold mb-4">About US</h1>
            <p class="text-gray-600 leading-relaxed mb-6">
                Anim aute id magna aliqua ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat aliqua.
            </p>
            <a href="login.php" class="inline-block bg-black text-white px-6 py-3 rounded hover:bg-gray-900">
            Login to Browse Our Products
            </a>
        </div>
        <div class="lg:w-1/2">
            <img src="../src/images/StockCake-Man Admiring Watches_1755237698.jpg" alt="Man looking at watches" class="rounded-lg shadow-lg">
        </div>
    </section>
    
    <section class="py-16 text-center">
        <h2 class="text-4xl font-bold mb-10">Our Brands</h2>
        <div class="flex justify-center items-center flex-wrap gap-25 px-4">
            <img src="../src/images/rolex-logo-black-and-white.png" alt="Rolex Logo" class="h-30 w-auto">
            <img src="../src/images/omega-logo-black-and-white.png" alt="Omega Logo" class="h-30 w-auto">
            <img src="../src/images/seiko-logo-png_seeklogo-124537.png" alt="Seiko Logo" class="h-30 w-auto">
            <img src="../src/images/Hublot-Logo.png" alt="Hublot Logo" class="h-30 w-auto">
        </div>
    </section>

  <?php
  require_once("../includes/footer.php");
  ?>
</body>
</html>