<?php 
    require("db.php");

    $sql = "SELECT
                livre.titre,
                livre.anneeparution,
                auteur.nom,
                auteur.prenom
            FROM
                livre
            INNER JOIN
                auteur ON livre.noauteur = auteur.noauteur
            WHERE
                auteur.nom LIKE :recherche_auteur 
                OR auteur.prenom LIKE :recherche_auteur 
                OR CONCAT(auteur.prenom, ' ', auteur.nom) LIKE :recherche_auteur 
                OR CONCAT(auteur.nom, ' ', auteur.prenom) LIKE :recherche_auteur";

    $stmt = $connexion->prepare($sql);

    // 1. On vérifie d'abord si le paramètre existe pour éviter l'erreur "Undefined array key"
    $terme = isset($_GET["recherche_auteur"]) ? $_GET["recherche_auteur"] : '';

    // 2. On prépare le terme de recherche avec les wildcards
    $recherche_auteur = '%' . $terme . '%';

    // 3. On exécute la requête en passant le paramètre dans un tableau.
    //    Cette méthode gère automatiquement les paramètres répétés et corrige l'erreur SQLSTATE[HY093].
    

    try {
        $stmt->execute([':recherche_auteur' => $recherche_auteur]);
    } catch (Exception $e) {
        echo "Erreur lors de l'insertion : " . $e->getMessage();
        die(); 
    }
    
    while($resultat = $stmt->fetch(PDO::FETCH_OBJ)){
        echo htmlspecialchars($resultat->titre) . ' ' . htmlspecialchars($resultat->nom) . ' ' . htmlspecialchars($resultat->prenom) . ' - (' . htmlspecialchars($resultat->anneeparution) . ') <br>';
    }
    
?>
