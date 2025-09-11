<?php
// includes/redirect_helper.php
function redirect($url) {
    header("Location: " . $url);
    exit();
}
