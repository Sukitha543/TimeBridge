<?php
// includes/session_helper.php
session_start();

function setSessionMessage($key, $message) {
    $_SESSION[$key] = $message;
}

function getSessionMessage($key) {
    if (isset($_SESSION[$key])) {
        $msg = $_SESSION[$key];
        unset($_SESSION[$key]);
        return $msg;
    }
    return null;
}
// redirect("../views/adminRegister.php");