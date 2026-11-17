<?php
require "config.php";
$id = $_GET["id"] ?? null;

if (!$id) {
    header("Location: lista_autori.php");
    exit;
}
$stmt = $pdo->prepare("SELECT * FROM autori WHERE id = ?");
$stmt->execute([$id]);
$autore = $stmt->fetch();

if (!$autore) {
    header("Location: lista_autori.php");
    exit;
}
?>
<html lang="en-GB">
<head>


</head>

<body>
<form method="POST" action="attiva_modifica_autore.php">
  <fieldset>
    <legend>Autore:</legend>
    <input type="hidden" name="id" value="<?= $autore['id'] ?>">
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($autore['nome']) ?>" required><br><br>
    <br>
    <label for="cognome">Cognome:</label><br>
    <input type="text" id="cognome" name="cognome" value="<?= htmlspecialchars($autore['cognome']) ?>" required><br><br>
    <br>
    <label for="datanascita">Data nascita:</label><br>
    <input type="date" id="datanascita" name="datanascita" value="<?= htmlspecialchars($autore['datanascita']) ?>"><br><br>
    <br>
    <label for="oranascita">Ora Nascita:</label><br>



    <input type="time" id="oranascita" name="oranascita" value="<?= htmlspecialchars($autore['oranascita']) ?>"><br><br>



    <br><br>
    <input type="SUBMIT" value="Salva">
  </fieldset>
</form>
<a href="lista_autori.php">Torna alla lista autori</a>

</body>
</html>
</form>
</body>
</html>

