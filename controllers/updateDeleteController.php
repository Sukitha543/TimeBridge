<?php
session_start();
require_once "../models/dbh_config.php";
require_once "../models/Product.php";
require_once "../functions/oldInputs.php";
require_once "../routes.php";

// Sanitize input function
function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? ''; // "update" or "delete"
    $productCode = sanitize($_POST['productcode'] ?? '');

    if (empty($productCode)) {
        $_SESSION['error'] = "Product code is required!";
        redirectTo('manage_product', $routes);
        exit();
    }

    // For update
    if ($action === 'update') {
        // Sanitize all fields
        $brand = sanitize($_POST['brand'] ?? '');
        $model = sanitize($_POST['model'] ?? '');
        $diameter = sanitize($_POST['diameter'] ?? '');
        $type = sanitize($_POST['type'] ?? '');
        $material = sanitize($_POST['material'] ?? '');
        $strap = sanitize($_POST['strap'] ?? '');
        $resistence = sanitize($_POST['water_resistence'] ?? '');
        $calibre = sanitize($_POST['calibre'] ?? '');
        $price = sanitize($_POST['price'] ?? '');
       
        // Save old inputs in case of error
        $_SESSION['old_manage_product'] = [
            'productcode' => $productCode,
            'brand' => $brand,
            'model' => $model,
            'diameter' => $diameter,
            'type' => $type,
            'material' => $material,
            'strap' => $strap,
            'water_resistence' => $resistence,
            'calibre' => $calibre,
            'price' => $price,
           
        ];

        // Validation: all fields required
        if (
            empty($brand) || empty($model) || empty($diameter) || empty($type) ||
            empty($material) || empty($strap) || empty($resistence) || empty($calibre) ||
            empty($price)
        ) {
            $_SESSION['error'] = "All fields are required!";
            redirectTo('manage_product', $routes);
            exit();
        }

        // Handle image if uploaded
        $imageUrl = '';
        if (!empty($_FILES['image']['name'])) {
            $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
            $fileName = $_FILES['image']['name'];
            $fileTmp = $_FILES['image']['tmp_name'];
            $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            if (!in_array($ext, $allowedExts)) {
                $_SESSION['error'] = "Invalid image type. Only JPG, PNG, GIF allowed.";
                redirectTo('manage_product', $routes);
                exit();
            }

            $uploadDir = "../uploads/";
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

            $newFileName = uniqid() . "." . $ext;
            $filePath = $uploadDir . $newFileName;

            if (!move_uploaded_file($fileTmp, $filePath)) {
                $_SESSION['error'] = "Failed to upload image.";
                redirectTo('manage_product', $routes);
                exit();
            }

            $imageUrl = "uploads/" . $newFileName;
        } else {
            // Keep the old image if no new image uploaded
            $productModel = new Product('', '', '', '', '', '', '', '', '', '', '', '');
            $product = $productModel->findByCode($productCode);
            $imageUrl = $product['image'] ?? '';
        }

        // Update product
        $updateProduct = new Product($brand, $model, $productCode, $type, $diameter, $material, $strap, $resistence, $calibre, $price, $quantity, $imageUrl);
        $updateProduct->update();
        clearOldManageInputs();
        redirectTo('manage_product', $routes);
        exit();
    }

   if ($action === 'delete') {
        $product = new Product("", "", $productCode, "", "", "", "", "", "", "", "", "");
        $product->delete();
        clearOldManageInputs();
        redirectTo('manage_product', $routes);
        exit();
    }
}

       
    


