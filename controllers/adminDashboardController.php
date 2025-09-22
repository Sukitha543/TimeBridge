<?php
require_once "../models/product.php";
require_once "../models/customer.php";
require_once "../includes/auth.php";
requireRole("admin");

$products = new Product('','','','','','','','','','','','');
$customers = new Customer('','','','','','','');

$productCount = $products->getProductCount();
$customerCount = $customers->getCustomerCount();

require_once ("../views/adminDashboard.php");
