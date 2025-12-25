<h1> WORKING </h1>
<?php
    require("db.php");

    $sql = "SELECT
                livre.nolivre,
                livre.titre,
                livre.anneeparution,
                livre.detail,
                livre.photo,
                auteur.nom,
                auteur.prenom
            FROM
                livre
            INNER JOIN
                auteur ON livre.noauteur = auteur.noauteur
            WHERE
                livre.nolivre LIKE :id_livre";

    $id_livre = $_GET['id_livre'];
?>