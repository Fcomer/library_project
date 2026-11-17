<?php
require "config.php";

$id = $_GET["id"] ?? null;

if ($id) {
	//$stmt = $pdo->prepare("DELETE FROM libri WHERE autore_id = ?");
    //$stmt->execute([$id]);
    $stmt = $pdo->prepare("DELETE FROM autori WHERE id = ?");
    $stmt->execute([$id]);
}
    header("Location: lista_autori.php");
    exit;
?>