<?php
require_once("../../includes/auth.php");
requireRole("customer");
?>
<h1>Welcome Customer <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
