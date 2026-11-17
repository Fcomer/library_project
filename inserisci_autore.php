<html> 
<?php
require "config.php";

// 1. Recuperiamo i valori inviati dal form tramite POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"] ?? '';
    $cognome = $_POST["cognome"] ?? '';

    // 2. Prepariamo ed eseguiamo la query SQL con i segnaposto ?
    $stmt = $pdo->prepare("INSERT INTO autori (nome, cognome) VALUES (?, ?)");
    $stmt->execute(array($nome, $cognome));

    // 3. Reindirizziamo l'utente alla pagina della lista autori
    header("Location: lista_autori.php");
    exit;
}
?>

<!--
require "config.php";
$stmt = $pdo->query(
   insert into autori values ("nome", "cognome")
);
?>
<body>
<a href="lista_autore.php?>">tona alla pagina autori</a>
</body>
</html>



echo $_POST["nome"];
echo $_POST["cognome"];
?>


require "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];

    $stmt = $pdo->prepare("INSERT INTO autori (nome, cognome) VALUES (?, ?)");
    $stmt->execute([$nome, $cognome]);

    // Reindirizza alla lista autori
    header("Location: lista_autori.php");
    exit;
}
?>
-->