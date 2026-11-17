<?php
require "config.php";

$id = $_POST["id"] ?? null;
$titolo = $_POST["titolo"] ?? '';
$anno = $_POST["anno"] ?? '';
//$nome = $_POST["nome"] ?? '';
//$cognome = $_POST["cognome"] ?? '';
$idautore = $_POST["idautore"] ?? null;

if ($id) {
	$stmt = $pdo->prepare("UPDATE libri SET titolo = ?, anno = ?, autore_id = ? WHERE id = ?");
	$stmt->execute([$titolo, $anno, $idautore, $id]);
}
    header("Location: lista_libri.php");
    exit;
?>

<?php/*
echo $_POST["titolo"];
echo $_POST["cognome"];
echo $_POST["nome"];
?>*/
