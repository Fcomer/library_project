<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// config.php
$host = "localhost";
$dbname = "libreria";
$user = "root";
$password = "yellowhillsideM4S!";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connessione al database fallita: " . $e->getMessage());
}