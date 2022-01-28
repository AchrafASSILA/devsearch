<?php
require_once "./db/db.php";

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM skills WHERE id=:id";
    $statement = $db->prepare($sql);
    $statement->execute([":id" => $id]);
    header("Location:/php_devsearch/account.php");
} else {
    header("Location:/php_devsearch/login.php");
}
