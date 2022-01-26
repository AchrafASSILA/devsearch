<?php


session_start();
// session_unset($_SESSION["username_admin"]);
unset($_SESSION['username_admin']);

// session_destroy();
header("Location:/php_devsearch/admin/");
