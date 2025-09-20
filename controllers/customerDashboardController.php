<?php
require_once "../models/dbh_config.php";
require_once "../models/Product.php";
require_once "../includes/auth.php";
requireRole("customer");



$productModel = new Product("", "", "", "", "", "", "", "", "", "", "", "");
$products = $productModel->getAllProducts();

require_once "../views/customerDashboard.php";
