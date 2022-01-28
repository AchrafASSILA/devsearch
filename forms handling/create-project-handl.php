<?php
session_start();
if (isset($_SESSION["username"]) && isset($_POST["submit"])) {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
}
