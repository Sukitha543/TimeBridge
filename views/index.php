<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TimeBridge</title>
  <link href="../src/output.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" 
  integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" 
  crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="font-sans text-gray-800">

  <!-- Navbar -->
<header class="flex items-center justify-between px-6 py-4 shadow-sm">
  <!-- Left side: Logo + Nav -->
  <div class="flex items-center space-x-10">
    <!-- Logo -->
    <img src="../src/images/logo.png" alt="TimeBridge Logo" class="h-20 w-auto">

    <!-- Navigation -->
    <nav>
      <ul class="flex space-x-8 text-gray-700 font-medium">
        <li><a href="#" class="hover:text-black">Home</a></li>
        <li><a href="#" class="hover:text-black">About Us</a></li>
        <li><a href="#" class="hover:text-black">Login</a></li>
      </ul>
    </nav>
  </div>
</header>


  <!-- Hero Section -->
  <section class="grid grid-cols-1 md:grid-cols-2 items-center px-8 py-12 md:px-16 lg:px-24 gap-8">
    <!-- Left Content -->
    <div>
      <h1 class="text-4xl font-bold mb-4">Find Your Perfect<br>Timepiece Online</h1>
      <p class="text-gray-600 mb-6">
        Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. 
        Elit sunt amet fugiat veniam occaecat fugiat aliqua.
      </p>
      <a href="#" class="inline-block bg-black text-white px-6 py-3 rounded hover:bg-gray-900">
        Login to Browse Our Products
      </a>
    </div>

    <!-- Right Image -->
    <div class="flex justify-center">
      <img src="../src/images/hero.jpg" alt="Luxury Watch" class="rounded-lg shadow-lg max-h-[400px]">
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-black text-white text-center px-8 py-10 space-y-4">
    <!-- Links -->
    <div class="flex justify-center space-x-8">
      <a href="#" class="hover:underline">Home</a>
      <a href="#" class="hover:underline">About Us</a>
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
