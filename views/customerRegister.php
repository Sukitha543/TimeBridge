<?php
    $title = "TimeBridge - Customer Register";
    require_once("../includes/meta.php");
    session_start();

    // Function to display session messages
    function getSessionMessage($type){
        if(isset($_SESSION[$type])){
            $msg = $_SESSION[$type];
            unset($_SESSION[$type]);
            return $msg;
        }
        return false;
}
?>
<body class="bg-gray-100 text-gray-800 font-sans flex flex-col min-h-screen">
<main class="flex-grow flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-4xl flex flex-col lg:flex-row overflow-hidden">
            <div class="lg:w-1/2 p-8 lg:p-16 flex flex-col justify-center items-center">
                <div class="w-full max-w-md">
                    <div class="mb-8 text-center">
                        <img src="../src/images/logo.png" alt="TimeBridge Logo" class="h-30 mx-auto mb-4">
                    </div>

                    <h1 class="text-3xl font-bold mb-8 text-center">Customer Register</h1>

                        <!-- Show session messages -->
                    <?php if ($msg = getSessionMessage("error")): ?>
                        <div class="bg-red-100 text-red-700 p-3 rounded mb-4"><?= $msg ?></div>
                    <?php elseif ($msg = getSessionMessage("success")): ?>
                        <div class="bg-green-100 text-green-700 p-3 rounded mb-4"><?= $msg ?></div>
                    <?php endif; ?>

                    <form class="space-y-4" action="../controllers/customercontroller.php" method="post">
                        <div>
                            <input type="text" name="firstName"  placeholder="First Name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                        </div>
                        <div>
                            <input type="text" name="lastName" placeholder="Last Name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                        </div>
                        <div>
                            <input type="email" name="email" placeholder="Email Address" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                        </div>
                        <div>
                            <input type="text" name="address" placeholder="Shipping Address" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                        </div>
                        <div>
                            <input type="tel" name="contact" placeholder="Contact Number" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                        </div>
                        <div>
                            <input type="text" name="username" placeholder="Username" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                        </div>
                        <div>
                            <input type="password" name="password" placeholder="Password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                        </div>
                        <div>
                            <input type="password" name="confirmPassword" placeholder="Confirm Password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                        </div>
                        <div>
                            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">
                                Sign Up
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="lg:w-1/2 flex-shrink-0 hidden lg:block">
                <img src="../src/images/StockCake-Luxury Watch Collection_1755091286.jpg" alt="Collection of watches" class="object-cover w-full h-full rounded-r-lg">
            </div>
        </div>
    </main>
    <?php
    require_once("../includes/footer.php"); 
    ?>
</body>
</html>