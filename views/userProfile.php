<?php
$title = "User Profile";
require_once("../includes/customer/customerHeader.php");
?>

<body class="bg-gray-100 flex flex-col min-h-screen">
    <main class="flex-grow flex items-center justify-center p-6">
        <div class="bg-white shadow-xl rounded-2xl w-full max-w-2xl overflow-hidden">

            <div class="bg-gradient-to-r from-gray-200 to-gray-50 px-6 py-4">
                <h2 class="text-4xl font-bold">User Profile</h2>
                <p class="text-sm font-semibold">Manage your personal information</p>
            </div>

            <?php if (!empty($_SESSION['error'])): ?>
                <p class="text-red-600 m-4"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
            <?php endif; ?>
            <?php if (!empty($_SESSION['success'])): ?>
                <p class="text-green-600 m-4"><?= $_SESSION['success']; unset($_SESSION['success']); ?></p>
            <?php endif; ?>

            <form action="../controllers/manageCustomerController.php" method="POST" class="p-6 space-y-6">

                <!-- First + Last Name -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="mt-2 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-black focus:border-black text-sm p-3" value="<?= htmlspecialchars($customer['firstname'] ?? '') ?>">
                    </div>
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="mt-2 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-black focus:border-black text-sm p-3" value="<?= htmlspecialchars($customer['lastname'] ?? '') ?>">
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label for="email_address" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" id="email_address" name="email_address" class="mt-2 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-black focus:border-black text-sm p-3" value="<?= htmlspecialchars($customer['email'] ?? '') ?>">
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="tel" id="phone_number" name="phone_number" class="mt-2 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-black focus:border-black text-sm p-3" value="<?= htmlspecialchars($customer['contactnumber'] ?? '') ?>">
                </div>

                <!-- Shipping Address -->
                <div>
                    <label for="shipping_address" class="block text-sm font-medium text-gray-700">Shipping Address</label>
                    <input type="text" id="shipping_address" name="shipping_address" class="mt-2 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-black focus:border-black text-sm p-3" value="<?= htmlspecialchars($customer['shippingaddress'] ?? '') ?>">
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-4 pt-4 border-t border-gray-200">
                    <button type="submit" name="save_profile" class="bg-black text-white px-6 py-2 rounded-lg font-medium hover:bg-gray-800 transition-colors">Save</button>

                    <input type="hidden" name="delete_profile" value="0" id="delete_profile">
                    <input type="hidden" name="confirm_delete" id="confirm_delete" value="no">
                    <!-- Delete button triggers JS confirmation -->
                    <button type="button" name="delete_profile" id="deleteBtn" class="bg-red-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-red-700 transition-colors">Delete</button>
                </div>
            </form>
        </div>
    </main>

    <?php require_once("../includes/customer/customerFooter.php")?>

    <script src="../script/script.js"></script>
</body>
</html>
