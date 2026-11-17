<?php
require "config.php";
$id = $_GET["id"];
if (!$id) {
    header("Location: lista_libri.php");
    exit;
}
$stmt = $pdo->prepare("SELECT * FROM libri WHERE id = ?");
$stmt->execute([$id]);
$libro = $stmt->fetch();

if (!$libro) {
    header("Location: lista_libri.php");
    exit;
}
$stmt = $pdo->query("SELECT id, nome, cognome FROM autori ORDER BY cognome ASC");
$autori = $stmt->fetchAll();
//$stmt = $pdo->prepare("SELECT * FROM autori WHERE id = ?");
//$stmt->execute($libro['autore_id']);
//$autore = $stmt->fetch();

//if (!$autore) {
//    header("Location: lista_libri.php");
//    exit;
//}
?>
?>
<html>
<head>


</head>
<style>
  body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            text-align: center;
            padding: 40px;
        }
  legend {
            font-weight: bold;
            color: #2c3e50;
            padding: 0 8px;
        }
  input[type="text"] {
            width: 80%;
            padding: 8px 10px;
            margin-top: 4px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Mantiene la larghezza nei margini */
        }
</style>
<body>
<form method="POST" action="attiva_modifica_libri.php">
  <fieldset>
    <legend>Modifica Dati:</legend>
    <input type="hidden" name="id" value="<?= $libro['id'] ?>">
    <label for="titolo">Titolo:</label><br>
    <input type="text" id="titolo" name="titolo" value="<?= htmlspecialchars($libro['titolo']) ?>" required><br><br>
    <label for="anno">Anno:</label><br>
    <input type="text" id="anno" name="anno" value="<?= htmlspecialchars($libro['anno']) ?>" ><br><br>
    <select name="idautore">
            <?php foreach ($autori as $autore): ?>
            <option value="<?= $autore["id"] ?>"><?= htmlspecialchars($autore["nome"]) ?> <?= htmlspecialchars($autore["cognome"]) ?></option>
            <?php endforeach; ?>
        </select>
    <!--<label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome" value="<?//= htmlspecialchars($autore['nome']) ?>" required><br><br>
    <label for="cognome">Cognome:</label><br>
    <input type="text" id="cognome" name="cognome" value="<?//= htmlspecialchars($autore['cognome']) ?>" required><br><br>
    -->
    <br><br>
    <input type="SUBMIT" value="Salva">
  </fieldset>
</form>
<a href="lista_libri.php">Torna alla lista libri</a>

</body>
</html>