<?php
require "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = = $_GET["id"] ?? null;

    $stmt = $pdo->prepare("DELETE FROM libri where id = ?");
    $stmt->execute([$id]);

    header("Location: lista_libri.php");
    exit;
}
?>
