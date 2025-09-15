<?php
session_start();
$title = "Login - TimeBridge";
require_once "../routes.php";
require_once("../includes/meta.php");
?>

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
                        Not a member? <a href="register.php" class="text-blue-600 hover:underline">Create an Account</a>
                    </p>
                      <!-- Show session messages -->
                    <?php if(isset($_SESSION['error'])): ?>
                            <div class="bg-red-100 text-red-700 p-3 rounded-md shadow-md mb-4" role="alert">
                            <?= htmlspecialchars($_SESSION['error']); ?>
                                <?php unset($_SESSION['error']); ?>
                            </div>
                    <?php endif; ?>
                    <form class="space-y-6" action="../controllers/loginController.php" method="post">
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
    <?php
    require_once("../includes/footer.php"); 
    ?>
</body>
</html>



