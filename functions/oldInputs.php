<?php

function old($key) {
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
