<html> 
<?php
require "config.php";

// 1. Recuperiamo i valori inviati dal form tramite POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$titolo = $_POST["titolo"] ?? '';
	$anno = $_POST["anno"] ?? 1;
    $idautore = $_POST["idautore"] ?? '';

    // 2. Prepariamo ed eseguiamo la query SQL con i segnaposto ?
    $stmt = $pdo->prepare("INSERT INTO libri (titolo, anno, autore_id) VALUES (?, ?, ?)");
    $stmt->execute([$titolo, $anno, $idautore]);

    // 3. Reindirizziamo l'utente alla pagina della lista autori
    header("Location: lista_libri.php");
    exit;
}
?>
<!--
echo $_POST["titolo"];
echo $_POST["cognome autore"];
echo $_POST["nome autore"];
-->