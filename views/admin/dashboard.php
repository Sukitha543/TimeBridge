<?php
require_once "../../includes/auth.php";
requireRole ("admin");
?>

<h1>Welcome Admin <?= htmlspecialchars($_SESSION['username']); ?>!</h1>
