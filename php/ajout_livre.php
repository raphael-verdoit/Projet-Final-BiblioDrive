<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require 'header.php'; require 'db.php'?>
    <form method="get">
        <label for="Auteur">Auteur</label>
        <input type="text" name="Auteur" id="Auteur"> <br>
        <label for="Titre">Titre</label>
        <input type="text" name="Titre" id="Titre"> <br>
        <label for="ISBN13">ISBN13</label>
        <input type="number" name="ISBN13" id="ISBN13"> <br>
        <label for="anneParution">Année de Parution</label>
        <input type="number" name="anneParution" id="anneParution"> <br>
        <label for="Resume">Résumé</label>
        <input type="text" name="Resume" id="Resume"> <br>
        <label for="Cover">Image</label>
        <input type="file" name="Cover" id="Cover"> <br>
    </form>
</body>
</html>