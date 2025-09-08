<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeBridge</title>
    <link href="../src/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" 
    integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-white text-gray-800 font-sans">

    <!-- Navbar -->
<header class="flex items-center justify-between px-6 py-4 shadow-sm">
  <!-- Left side: Logo + Nav -->
  <div class="flex items-center space-x-10">
    <!-- Logo -->
    <img src="../src/images/logo.png" alt="TimeBridge Logo" class="h-20 w-auto">

    <!-- Navigation -->
    <nav>
      <ul class="flex space-x-8 text-gray-700 font-medium">
        <li><a href="index.php" class="hover:text-black">Home</a></li>
        <li><a href="aboutus.php" class="hover:text-black">About Us</a></li>
        <li><a href="login.php" class="hover:text-black">Login</a></li>
      </ul>
    </nav>
  </div>
</header>

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

    <!-- Footer -->
  <footer class="bg-black text-white text-center px-8 py-10 space-y-4">
    <!-- Links -->
    <div class="flex justify-center space-x-8">
      <a href="index.php" class="hover:underline">Home</a>
      <a href="aboutus.php" class="hover:underline">About Us</a>
    </div>

    <!-- Social Icons -->
    <div class="flex justify-center space-x-6 text-2xl">
      <a href="#"><i class="fab fa-facebook"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
    </div>

    <!-- Contact -->
    <p>Colombo 03 - 41 Galle Road &nbsp;&nbsp; Tel: +94 11 2335787 &nbsp;&nbsp; Email: info@TimeBridge.lk</p>
    <p class="text-gray-400 text-sm">© 2025 TimeBridge Inc. All rights reserved.</p>
  </footer>
    
</body>
</html>