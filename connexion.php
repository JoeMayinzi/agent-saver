<?php
$host = "localhost";
$dbname = "tutos-php";
$user = "root";
$password = "";

$dsn = "mysql:host=$host;dbname=$dbname";

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}
