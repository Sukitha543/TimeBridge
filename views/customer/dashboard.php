<?php
require_once "../../includes/auth.php";
requireRole("customer");
?>

<h1>Welcome Customer <?= htmlspecialchars($_SESSION['username']); ?>!</h1>
