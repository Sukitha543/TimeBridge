<?php

function old_add($key) {
    if (isset($_SESSION['old_inputs'][$key])) {
        return htmlspecialchars($_SESSION['old_inputs'][$key]);
    }
    
    return '';
}

// Call this after successfully using the old inputs to clear them if needed
function clearOldInputs() {
    if (isset($_SESSION['old_inputs'])) {
        unset($_SESSION['old_inputs']);
    }
}

// For Manage Product
function old_manage($key) {
    if (isset($_SESSION['old_manage_product'][$key])) {
        return htmlspecialchars($_SESSION['old_manage_product'][$key]);
    }
    return '';
}

function clearOldManageInputs() {
    if (isset($_SESSION['old_manage_product'])) {
        unset($_SESSION['old_manage_product']);
    }
}
