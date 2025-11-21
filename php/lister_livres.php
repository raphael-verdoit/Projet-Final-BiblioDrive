<?php 
    include_once("db.php");

    $stmt = $connexion->query("SELECT titre, anneeparution FROM livre WHERE noauteur=:noauteur");
    $noauteur = $_GET("noauteur");

    while($auteur = $stmt->fetch(PDO::FETCH_OBJ)){
        echo $auteur->noregion.' | '.$region->nomregion. '<br>';
    }
?>