<?php
require "config.php";

$ordina = $_GET["ordinamento"] ?? 'cognome_nome';

switch ($ordina) {
    case 'num_libri':
        $orderBy = "numero_libri DESC, autori.cognome ASC";
        break;
    case 'nome_cognome':
        $orderBy = "autori.nome ASC, autori.cognome ASC";
        break;
    case 'cognome_nome':
    default:
        $orderBy = "autori.cognome ASC, autori.nome ASC";
        break;
}

$stmt = $pdo->query("
    SELECT autori.id, autori.cognome, autori.nome, autori.datanascita, autori.oranascita, count(libri.id) as numero_libri
    FROM autori
    Left JOIN libri ON libri.autore_id = autori.id
    Group by autori.id, autori.cognome, autori.nome
    ORDER BY $orderBy
");
$autori = $stmt->fetchAll();
?>


<!doctype html>
<!doctype html>
<html>
<head>
<title>lista_autori</title>
</head>

<h1>Autori</h1>

<style>

body{
text-align: center;
padding: 40px;
}

h5{
margin: 5px;
}

table{
margin: 0 auto;
width: 80%;
background-color: #f8f999;
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
padding: 10px;
}

thead{
background-color: #555555;
color: #ffffff;
}

th,td{
padding: 12px 15px;
text-align: center;
}

tbody tr:nth-child(even) {
background-color: #f8f9fa;
}

</style>

<body>
<h5>ordinamento</h5>
<form>
            <label for="ordinamento">Ordina per:</label>
            <select name="ordinamento" id="ordinamento">
                <optgroup label="Ordine Alfabetico">
                <option value="cognome_nome">Cognome e Nome</option>
                <option value="nome_cognome">Nome Cognome</option>
            </optgroup>
            <optgroup label="Altro">
                <option value="num_libri">Numero di libri</option>
            </optgroup>
            </select>
            <button type="submit">Ordina</button>
        </form>


<table>
    <caption>
        <p>Lista Autori</p>
    </caption>
    <thead>
        <tr><th>Nome</th><th>Cognome</th><th># libri in libreria</th><<th>datanascita</th><th>oranascita</th></tr>
    </thead>
    <tbody>
        <?php foreach ($autori as $autore): ?>
        <tr>
            <td><?= htmlspecialchars($autore["nome"]) ?></td>
            <td><?= htmlspecialchars($autore["cognome"]) ?></td>
            <td><?= htmlspecialchars($autore["numero_libri"]) ?></td>
            <td><?= htmlspecialchars(date('d/m/Y', strtotime($autore["datanascita"] ?? ' '))) ?></td>
            <td><?= htmlspecialchars($autore["oranascita"] ?? ' ') ?></td>
            <td>
                <a href="modifica_autore.php?id=<?= $autore["id"] ?>">modifica</a>-
                <a href="cancella_autore.php?id=<?= $autore["id"] ?>">elimina</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <!--
	<tr><td>Austin</td><td>Jane</td><td>3</td><td><a href="modifica_autore.php?id=1">modifica</a> <a href="cancella_autore.php?id=1">cancella</a></td></tr>
    <tr><td>Orwell</td><td>George</td><td>3</td><td><a href="modifica_autore.php?id=2">modifica</a> <a href="cancella_autore.php?id=2">cancella</a></td></tr>
     <-->
    </tbody>
</table>

<p>
<a href="crea_autore.php">crea autore</a>
</p>

<?php
//bottoni per inserire un nuovo autore, cognome e nome separati
//modo per ordinare gli autori per c e n
//altra modalita in cui si puo scegliere come si ordinano es. per numero di libri presenti di wuel autore
?>
</body>
</html>
