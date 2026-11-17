

<?php
/*
require "config.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare("INSERT INTO autori (nome, cognome) VALUES (?, ?)");
    $stmt->execute([$_POST["nome"], $_POST["cognome"]]);

    header("Location: index.php");
    exit;
}*/
?>
<!doctype html>
<html>
<head><title>Nuovo autore</title></head>
<body>
    <h1>Aggiungi un autore</h1>
    <form method="POST" action="inserisci_autore.php">
        Nome: <input type="text" name="nome" required><br>
        Cognome: <input type="text" name="cognome" required><br>
        Data di Nascita: <input type="date" id="datanascita" name="datanascita"><br><br>
        Ora di nascita: <input type="time" id="oranascita" name="oranascita"><br><br>
        <input type="submit" value="Salva">
    </form>
    <a href="lista_autori.php">tona alla lista autori</a>
</body>
</html>

<!--<html>
<head>


</head>

<body>
<form method="POST" action="inserisci_autore.php">
<label>nome</label>
<input type="TEXT" name="nome">
<br>
<label>cognome</label>
<input type="TEXT" name="cognome">
<br>
<input type="SUBMIT" value="SALVA">
</form>
</body>
</html>
-->