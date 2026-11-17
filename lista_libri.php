<?php
require "config.php";
$stmt = $pdo->query("
    SELECT libri.id, libri.titolo, libri.anno, autori.nome, autori.cognome
    FROM libri
    JOIN autori ON libri.autore_id = autori.id
    ORDER BY libri.titolo
");
$libri = $stmt->fetchAll();
?>
<!doctype html>
<html>
<title>lista libri</title>
</head>
<style>
        body {
            text-align: center;
            padding: 40px;
            font-family: sans-serif;
        }

        table {
            margin: 0 auto;
            width: 80%;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        thead {
            background-color: #555555;
            color: #ffffff;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }
    </style>
<body>

<h1>libri</h1>
<h5>ordinamento</h5>

<form>
            <label for="ordinamento">Ordina per:</label>
            <select name="ordinamento" id="ordinamento">
                <option value="Autore">Autore/Autrice</option>
		<option value="Alphabetico">titolo</option>
		<option value="ID_Libro">ordine di inserimento</option>
            </select>
            <button type="submit">Ordina</button>
        </form>

    <table>
        <caption>
            <p>Lista Libri</p>
        </caption>
        <thead>
	    <tr>
		<th>Titolo</th>
        <th>Anno</th>
                <th>Nome Autore</th>
                <th></th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($libri as $libro): ?>
        <tr>
            <td><?= htmlspecialchars($libro["titolo"]) ?></td>
            <td><?= htmlspecialchars($libro["anno"] ?? '') ?></td>
            <td><?= htmlspecialchars($libro["nome"] . " " . $libro["cognome"]) ?></td>
            <td>
                <a href="modifica_libri.php?id=<?= $libro["id"] ?>">modifica</a>
                <a href="cancella_libro.php?id=<?= $libro["id"] ?>">elimina</a>
            </td>
        </tr>
        <?php endforeach; ?>
	    <!--<tr>
		<td>1</td>
		<td>piccole donne</td>
                <td>Austin</td>
                <td>Jane</td>
                <td><a href="modifica_libri.php?id=1">modifica</a> <a href="cancella_libro.php?id=1">cancella</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>orgoglio e predgudizio</td>
		<td>Austin</td>
		<td>jane</td>
        <td><a href="modifica_libri.php?id=2">modifica</a> <a href="cancella_libro.php?id=2">cancella</a></td> 
            </tr>
            <-->
        </tbody>
    </table>
<p>
<p>
<a href="crea_libro.php">aggiungi libro</a>
</p>

<?php
//bottoni per inserire un nuovo autore, cognome e nome separati
//modo per ordinare gli autori per c e n
//altra modalita in cui si puo scegliere come si ordinano es. per numero di libri presenti di wuel autore
?>
</body>
</html>

