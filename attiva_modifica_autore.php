<?php
require "config.php";

$id = $_POST["id"] ?? null;
$nome = $_POST["nome"] ?? '';
$cognome = $_POST["cognome"] ?? '';
$datanascita = $_POST["datanascita"] ?? '';
$oranascita = $_POST["oranascita"] ?? '';

if ($id) {


//check the updatedat
    $stmt = $pdo->prepare("UPDATE autori SET nome = ?, cognome = ?, datanascita = ?, oranascita = ? WHERE id = ?");
    $stmt->execute([$nome, $cognome, $datanascita, $oranascita, $id]);
}
    header("Location: lista_autori.php");
    exit;
?>

<?php/*
echo $_POST["nome"];
echo $_POST["cognome"];
$stmt = $pdo->prepare("UPDATE libri SET nome = ? WHERE id_autore = ?");
    $stmt->execute([$nome, $id]);
    $stmt = $pdo->prepare("UPDATE libri SET cognome = ? WHERE id_autore = ?");
    $stmt->execute([$cognome, $id]);
?>*/
