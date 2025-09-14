<?php
require_once "../../includes/auth.php";
requireRole("admin");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="/src/output.css" rel="stylesheet">
</head>
<body class="bg-white text-black flex h-screen">

    <aside class="w-64 bg-black text-white p-6 flex flex-col items-center">
        <h1 class="text-2xl font-bold mb-8">Admin Dashboard</h1>

        <nav class="w-full">
            <ul class="space-y-4">
                <li><a href="#" class="block py-2 px-4 rounded-lg hover:bg-gray-800 transition-colors" onclick="showContent('dashboard-home')">Home</a></li>
                <li><a href="#" class="block py-2 px-4 rounded-lg hover:bg-gray-800 transition-colors" onclick="showContent('add-products')">Add Products</a></li>
                <li><a href="#" class="block py-2 px-4 rounded-lg hover:bg-gray-800 transition-colors" onclick="showContent('manage-products')">Manage Products</a></li>
                <li><a href="#" class="block py-2 px-4 rounded-lg hover:bg-gray-800 transition-colors" onclick="showContent('view-products')">View Products</a></li>
                <li><a href="#" class="block py-2 px-4 rounded-lg hover:bg-gray-800 transition-colors" onclick="showContent('manage-orders')">Manage Orders</a></li>
                <li><a href="#" class="block py-2 px-4 rounded-lg hover:bg-gray-800 transition-colors" onclick="showContent('view-customers')">View Customer Details</a></li>
            </ul>
        </nav>
    </aside>

    <main class="flex-1 p-8 overflow-y-auto">
        <div class="mb-8">
            <h2 class="text-3xl font-bold">Welcome, Admin!</h2>
        </div>

        <div id="dashboard-home" class="content-section">
            <h3 class="text-xl font-semibold mb-4">Dashboard Overview</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gray-100 p-6 rounded-lg shadow-md border border-gray-200">
                    <h4 class="text-lg font-medium text-gray-700">Total Customers</h4>
                    <p class="text-4xl font-bold mt-2">1,250</p>
                </div>

                <div class="bg-gray-100 p-6 rounded-lg shadow-md border border-gray-200">
                    <h4 class="text-lg font-medium text-gray-700">Total Products</h4>
                    <p class="text-4xl font-bold mt-2">350</p>
                </div>

                <div class="bg-gray-100 p-6 rounded-lg shadow-md border border-gray-200">
                    <h4 class="text-lg font-medium text-gray-700">Total Sales</h4>
                    <p class="text-4xl font-bold mt-2">$250,500</p>
                </div>
            </div>
        </div>

        <div id="add-products" class="content-section" style="display: none;">
            <h3 class="text-xl font-semibold mb-4">Add New Products</h3>
            <p>Form to add new product details will go here.</p>
        </div>

        <div id="manage-products" class="content-section" style="display: none;">
            <h3 class="text-xl font-semibold mb-4">Manage Existing Products</h3>
            <p>Table with options to edit or delete products will go here.</p>
        </div>

        <div id="view-products" class="content-section" style="display: none;">
            <h3 class="text-xl font-semibold mb-4">View All Products</h3>
            <p>A list or gallery of all products will be displayed here.</p>
        </div>

        <div id="manage-orders" class="content-section" style="display: none;">
            <h3 class="text-xl font-semibold mb-4">Manage Customer Orders</h3>
            <p>List of pending and completed orders with status updates will be shown here.</p>
        </div>

        <div id="view-customers" class="content-section" style="display: none;">
            <h3 class="text-xl font-semibold mb-4">View Customer Details</h3>
            <p>Information about registered customers will be available here.</p>
        </div>
    </main>

    <script>
        function showContent(sectionId) {
            // Hide all content sections
            const sections = document.querySelectorAll('.content-section');
            sections.forEach(section => {
                section.style.display = 'none';
            });
            // Show the selected content section
            const selectedSection = document.getElementById(sectionId);
            if (selectedSection) {
                selectedSection.style.display = 'block';
            }
        }
        
        // Show the dashboard home section by default on page load
        document.addEventListener('DOMContentLoaded', () => {
            showContent('dashboard-home');
        });
    </script>
</body>
</html>
<h1>Welcome Admin <?= htmlspecialchars($_SESSION['username']); ?>!</h1>
