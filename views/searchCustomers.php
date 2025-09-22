<?php
$title = "User Details";
require_once("../includes/auth.php");
requireRole("admin");
?>

<?php require_once("../includes/admin/adminHeader.php"); ?>
<body class="bg-gray-100 font-sans min-h-screen flex flex-col">
    <main class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold mb-6">Customer Details</h1>

        <?php if (isset($_SESSION['error'])): ?>
            <p class="bg-red-100 text-red-800 p-3 mb-4 rounded"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <form method="POST" action="../controllers/searchCustomerController.php" class="mb-6 flex space-x-4">
            <input type="text" name="customer_id" placeholder="Enter Customer ID" 
                   class="border p-2 rounded w-1/3" required>
            <button type="submit" name="get_customer" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition">
                Get Details
            </button>
        </form>
        <!-- Display customer details if available -->
        <?php if (isset($_SESSION['customer_details'])): 
            $customer = $_SESSION['customer_details'];
        ?>
            <div class="bg-white shadow rounded p-6">
                <p><strong>First Name:</strong> <?= htmlspecialchars($customer['firstname']); ?></p>
                <p><strong>Last Name:</strong> <?= htmlspecialchars($customer['lastname']); ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($customer['email']); ?></p>
                <p><strong>Shipping Address:</strong> <?= htmlspecialchars($customer['shippingaddress']); ?></p>
                <p><strong>Contact Number:</strong> <?= htmlspecialchars($customer['contactnumber']); ?></p>
            </div>
            <?php unset($_SESSION['customer_details']); ?>
        <?php endif; ?>
    </main>
    <script src="../script/script.js" defer></script>
</body>
<?php require_once("../includes/dashboardFooter.php")?>
</html>
