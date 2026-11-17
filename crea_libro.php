<?php
/*require "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare("INSERT INTO libri (titolo, anno, Select id_autore from autore a where a.nome =nome and a.cognome = cognome ) VALUES (?, ?, ?)");
    $stmt->execute([$_POST["titolo"], $_POST["anno"], $_POST["nome" + "cognome"]]);

    header("Location: index.php");
    exit;
}
*/
?>
<?php
require "config.php";

// Recuperiamo tutti gli autori dal database per il menu a tendina
$stmt = $pdo->query("SELECT id, nome, cognome FROM autori ORDER BY cognome ASC");
$autori = $stmt->fetchAll();
?>



<!doctype html>
<html>
<head><title>Nuovo Libro</title></head>
<body>
    <h1>Aggiungi un libro</h1>
    <form method="POST" action="inserisci_libro.php">
        Titolo: <input type="text" name="titolo" required><br>
        Anno: <input type="text" name="anno"><br>
        <!--riprendi da qua prova a dare delle opsioni di autori (c sarebe un modo per dinamicamente creare un nuovo autore quando serve?) -->
        <select name="idautore">
            <?php foreach ($autori as $autore): ?>
            <option value="<?= $autore["id"] ?>"><?= htmlspecialchars($autore["nome"]) ?> <?= htmlspecialchars($autore["cognome"]) ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Salva">
    </form>
</body>
</html>


	
<!--
<html>
<head>


</head>

<body>
<form method="POST" action="inserisci_libro.php">
	<?php
	//dinamicamente assegnare l'id qui?
	?>
<label>titolo</label>
<input type="TEXT" name="titolo">
<br>
<label>cognome</label>
<input type="TEXT" name="cognome autore">
<br>
<label>nome</label>
<input type="TEXT" name="nome autore">
<br>
<input type="SUBMIT" value="SALVA">
</form>
</body>
</html>
-->
