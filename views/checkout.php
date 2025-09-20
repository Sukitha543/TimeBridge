<?php
$title = "Checkout";
require_once("../includes/auth.php");
require_once("../routes.php");
requireRole("customer");
?>
<body class="bg-white text-gray-800 flex flex-col min-h-screen">
    <?php require_once("../includes/customer/customerHeader.php");?>
    <main class="flex-grow container mx-auto px-4 py-8">
        <div class="bg-white shadow-md rounded-lg p-6 mb-8 border border-gray-200">
    <h2 class="text-3xl font-bold mb-6 text-gray-900">Your Cart</h2>

    <?php if (isset($_SESSION['error'])): ?>
        <p class="text-red-600 mb-4"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
        <p class="text-green-600 mb-4"><?= $_SESSION['success']; unset($_SESSION['success']); ?></p>
    <?php endif; ?>

    <table class="w-full border-collapse border border-gray-300 text-center">
        <tbody>
            <?php $total = 0; ?>
            <?php foreach ($_SESSION['cart'] as $key => $item): ?>
                <tr>
                    <td class="px-4 py-2">
                        <img src="../<?= htmlspecialchars($item['image']) ?>" alt="<?= $item['brand'] ?>" class="w-50 h-40 object-contain">
                    </td>
                    <td class="px-4 py-2"><?= htmlspecialchars($item['brand']) ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($item['model']) ?></td>
                    <td class="px-4 py-2">Rs <?= number_format($item['price'], 2) ?></td>
                    <td class="px-4 py-2">
                        <a href="../controllers/cartController.php?remove=<?= urlencode($key) ?>" 
                           class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-800 transition">
                            Remove
                        </a>
                    </td>
                </tr>
                <?php $total += $item['price']; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="flex justify-end items-center mt-4">
        <p class="text-3xl font-bold text-gray-900"> Total: Rs <?= number_format($total, 2) ?></p>
    </div>
        <div class="bg-white shadow-md rounded-lg p-6 mb-8 border border-gray-200">
            <h2 class="text-xl font-semibold mb-6 text-gray-900">Checkout</h2>
            <form action="#" method="POST">
                <h3 class="text-lg font-medium mb-4">Billing Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" id="full_name" name="full_name" class="mt-1 block px-3 py-2 w-full rounded-md border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm p-2" required>
                    </div>
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <input type="text" id="address" name="address" class="mt-1 block px-3 py-2 w-full rounded-md border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm p-2" required>
                    </div>
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                        <input type="text" id="city" name="city" class="mt-1 px-3 py-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm p-2" required>
                    </div>
                </div>

                <h3 class="text-lg font-medium mb-4">Payment Type</h3>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <input id="payment_online" name="payment_method" type="radio" checked class="h-4 w-4 text-black border-gray-300 focus:ring-black" value="online_banking">
                        <label for="payment_online" class="ml-3 block text-sm font-medium text-gray-700">
                            Visa
                        </label>
                    </div>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <input id="payment_online" name="payment_method" type="radio" checked class="h-4 w-4 text-black border-gray-300 focus:ring-black" value="online_banking">
                        <label for="payment_online" class="ml-3 block text-sm font-medium text-gray-700">
                            Master
                        </label>
                    </div>

                    <div id="online_banking_details" class="pl-8 space-y-4">
                        <div>
                            <label for="bank_name" class="block text-sm font-medium text-gray-700">Bank Name</label>
                            <input type="text" id="bank_name" name="bank_name" class="mt-1 block px-3 py-2 w-full rounded-md border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm p-2" required>
                        </div>
                        <div>
                            <label for="account_number" class="block text-sm font-medium text-gray-700">Account Number</label>
                            <input type="text" id="account_number" name="account_number" class="mt-1 block px-3 py-2 w-full rounded-md border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm p-2" required>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-black text-white px-6 py-3 rounded hover:bg-gray-800 transition-colors text-lg font-medium w-full md:w-auto">
                        Confirm Payment
                    </button>
                </div>
            </form>
        </div>
    </main>
 <?php require_once("../includes/customer/customerFooter.php")?>
</body>
</html>