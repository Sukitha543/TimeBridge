<?php
session_start();
$title = "Login - TimeBridge";
require_once("../includes/meta.php");
?>

<body class="bg-gray-100 text-gray-800 font-sans flex flex-col min-h-screen">
<main class="flex-grow flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Login</h1>

        <!-- Show session messages -->
        <?php if(isset($_SESSION['error'])): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form class="space-y-4" action="../controllers/loginController.php" method="POST">
            <div>
                <input type="text" name="username" placeholder="Username" required 
                    class="w-full px-3 py-2 border rounded-md shadow-sm">
            </div>
            <div>
                <input type="password" name="password" placeholder="Password" required 
                    class="w-full px-3 py-2 border rounded-md shadow-sm">
            </div>
            <div>
                <button type="submit" 
                    class="w-full py-2 px-4 rounded-md shadow-sm text-white bg-black hover:bg-gray-800">
                    Login
                </button>
            </div>
        </form>
    </div>
</main>
</body>
</html>
