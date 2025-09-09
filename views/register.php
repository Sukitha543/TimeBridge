<?php
require_once("../includes/header.php");
?>
<body class="bg-gray-100 text-gray-800 font-sans">

    <main class="min-h-screen flex items-center justify-center p-4 lg:p-16">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-4xl flex flex-col lg:flex-row overflow-hidden">
            <div class="lg:w-1/2 p-8 lg:p-16 flex flex-col justify-center items-center text-center">
                <div class="w-full max-w-md">
                    <div class="mb-8">
                        <img src="../src/images/logo.png" alt="TimeBridge Logo" class="h-25 mx-auto mb-4">
                    </div>
                    <h1 class="text-3xl font-bold mb-2">User Registration</h1>
                    <p class="text-black mb-8">Select</p>

                    <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                      <a href="adminRegister.php" class="inline-block bg-black text-white px-6 py-3 rounded hover:bg-gray-900">
                      Admin
                      </a>
                     <a href="customerRegister.php" class="inline-block bg-black text-white px-6 py-3 rounded hover:bg-gray-900">
                     Customer
                    </a>
                    </div>
                </div>
            </div>

            <div class="lg:w-1/2 flex-shrink-0 hidden lg:block">
                <img src="../src/images/StockCake-Luxury Watch Collection_1755091286.jpg" alt="Watch and accessories" class="object-cover w-full h-full rounded-r-lg">
            </div>
        </div>
    </main>

    <?php
    require_once("../includes/footer.php"); 
    ?>
</body>
</html>