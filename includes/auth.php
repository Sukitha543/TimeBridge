<?php
session_start();

function requireLogin() {
    if (!isset($_SESSION['userid'])) {
        header("Location: /TimeBridge/views/login.php");
        exit();
    }
}

function requireRole($role) {
    requireLogin();
    
    if ($_SESSION['role'] !== $role) {
        http_response_code(403);
        echo "<h1>403 Forbidden</h1><p>You don’t have permission to access this page.</p>";
        exit();
    }
}
