<?php


session_start();
// session_unset();
unset($_SESSION['username']);
unset($_SESSION['id']);

// session_destroy();
header("Location:/devsearch/login.php");
