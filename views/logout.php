<?php
require_once("../routes.php");
session_start();
session_unset();
session_destroy();
redirectTo('login', $routes);
exit;
