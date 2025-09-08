<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="../src/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" 
    integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>TimeBridge - Sign In</title>
    
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    <main class="min-h-screen flex items-center justify-center p-4 lg:p-16">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-4xl flex flex-col lg:flex-row overflow-hidden">
            <div class="lg:w-1/2 p-8 lg:p-16 flex flex-col justify-center items-center">
                <div class="w-full max-w-md">
                    <div class="mb-8 text-center">
                        <img src="../src/images/logo.png" alt="TimeBridge Logo" class="h-25 mx-auto mb-4">
                    </div>
                    <h1 class="text-3xl font-bold mb-2 text-center lg:text-left">Sign in to your account</h1>
                    <p class="text-gray-600 mb-8 text-center lg:text-left">
                        Not a member? <a href="#" class="text-blue-600 hover:underline">Create an Account</a>
                    </p>
                    <form class="space-y-6">
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                            <input type="text" id="username" name="username" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" id="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                        </div>
                        <div class="text-sm text-right">
                            <a href="#" class="font-medium text-blue-600 hover:text-blue-500">Forgot password?</a>
                        </div>
                        <div>
                            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">
                                Sign In
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="lg:w-1/2 flex-shrink-0 hidden lg:block">
                <img src="../src/images/StockCake-Luxury Watches Displayed_1755082159.jpg" alt="Collection of watches" class="object-cover w-full h-full rounded-r-lg">
            </div>
        </div>
    </main>

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