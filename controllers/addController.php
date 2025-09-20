<?php
session_start();
require_once "../models/dbh_config.php";
require_once "../models/Product.php";
require_once "../functions/oldInputs.php";
require_once "../routes.php";

// sanitize function
function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Allowed options for dropdowns
$allowedBrands = ['Rolex', 'Omega', 'Seiko', 'Casio', 'Fossil'];
$allowedTypes = ['Male', 'Female'];
$allowedMaterials = ['Plastic', 'Steel'];
$allowedStraps = ['Leather', 'Steel'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $brand = sanitize($_POST['brand']);
    $model = sanitize($_POST['model']);
    $productCode = sanitize($_POST['productcode']);
    $diameter = sanitize($_POST['diameter']);
    $type = sanitize($_POST['type']);
    $material = sanitize($_POST['material']);
    $strap = sanitize($_POST['strap']);
    $resistence = sanitize($_POST['water_resistence']);
    $calibre = sanitize($_POST['calibre']);
    $price = sanitize($_POST['price']);
    $quantity = sanitize($_POST['quantity']);

    $_SESSION['old_inputs'] = [
        'brand' => $brand,
        'model' => $model,
        'productcode' => $productCode,
        'diameter' => $diameter,
        'type' => $type,
        'material' => $material,
        'strap' => $strap,
        'water_resistence' => $resistence,
        'calibre' => $calibre,
        'price' => $price,
        'quantity' => $quantity,
        'image' => $_FILES['image']['name'],

    ];

    // Validate required fields
    if (
        empty($brand) || empty($model) || empty($productCode) || empty($diameter) ||
        empty($type) || empty($material) || empty($strap) || empty($resistence) ||
        empty($calibre) || empty($price) || empty($quantity) || empty($_FILES['image']['name'])
    ) {
        $_SESSION['error'] = "All fields are required!";
        redirectTo('add_product', $routes);
        exit();
    }



    // Validate dropdown selections
    if (!in_array($brand, $allowedBrands)) {
        $_SESSION['error'] = "Invalid brand selected!";
        redirectTo('add_product', $routes);
        exit();
    }

    if (!in_array($type, $allowedTypes)) {
        $_SESSION['error'] = "Invalid type selected!";
        redirectTo('add_product', $routes);
        exit();
    }

    if (!in_array($material, $allowedMaterials)) {
        $_SESSION['error'] = "Invalid material selected!";
        redirectTo('add_product', $routes);
        exit();
    }

    if (!in_array($strap, $allowedStraps)) {
        $_SESSION['error'] = "Invalid strap selected!";
        redirectTo('add_product', $routes);
        exit();
    }

    if (!in_array($strap, $allowedStraps)) {
        $_SESSION['error'] = "Invalid strap selected!";
        redirectTo('add_product', $routes);
        exit();
    }


    // Validate image
    $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
    $fileName = $_FILES['image']['name'];
    $fileTmp = $_FILES['image']['tmp_name'];
    $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (!in_array($ext, $allowedExts)) {
        $_SESSION['error'] = "Invalid image type. Only JPG, PNG, GIF allowed.";
        redirectTo('add_product', $routes);
        exit();
    }

    // Ensure uploads folder exists
    $uploadDir = "../uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Generate unique file name
    $newFileName = uniqid() . "." . $ext;
    $filePath = $uploadDir . $newFileName;
    $fileUrl = "uploads/" . $newFileName; // store this in DB

    if (!move_uploaded_file($fileTmp, $filePath)) {
        $_SESSION['error'] = "Failed to upload image.";
        redirectTo('add_product', $routes);
        exit();
    }

    // Create product object
    $product = new Product( $brand, $model, $productCode, $type, $diameter, $material, $strap, $resistence, $calibre, $price, $quantity, $fileUrl
    );

   if ($product->add()) {
    clearOldInputs(); // clear old inputs only on success
    //$_SESSION['success'] = "Product added successfully!";
    redirectTo('add_product', $routes);
    exit();
    } else {
    redirectTo('add_product', $routes); // redirect on error
    exit();
    }
}
 

