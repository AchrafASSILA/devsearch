<?php


$dsn = 'mysql:root=localhost;dbname=devsearch_db';
$user = 'root';
$password = '';

try {
    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}
