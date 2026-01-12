<?php
session_start(); 
require_once 'php/db.php'; 


$erreur = null; 

if (isset($_POST['login_submit'])){
    $email = $_POST['email'];
    $mdp = $_POST['pass'];

    try {
        $sql = 'SELECT * FROM utilisateur WHERE mel = ?';
        $stmt = $connexion->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_OBJ);

        if ($user && $mdp === $user->motdepasse) {
            $_SESSION['mel'] = $user->mel; 
            $_SESSION['user_name'] = $user->prenom . ' ' . $user->nom;
            
            header('Location: accueuil.php'); 
            exit();
        } else {
            $erreur = "Email ou mot de passe incorrect.";
        }
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }
}

?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Biblio-Drive - Accueil</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-9"> <?php require "./php/header.php"; ?>
                    <form action="" method="get">
                        <input type="text" name="recherche_auteur" placeholder="Nom de l'auteur : ">
                        <button type="submit"><img src="./images/loupe.svg" alt="loupe.svg" id="loupe"></button>
                    </form>
                </div>
                <div class="col-3"><img src="./images/logo.gif" alt="logo bibli"></div> </div>
        
            <div class="row">
                <div class="col-9"> <?php
                        $sql = "SELECT titre, photo FROM livre WHERE photo != '' ORDER BY RAND() LIMIT 3";
                        $resultat = $connexion->query($sql);
                        $livres = $resultat->fetchAll();
                        ?>

                        <div id="monCarrousel" class="carousel slide" data-bs-ride="carousel" style="max-width: 300px; margin: 20px auto;">
                            
                            <div class="carousel-inner">
                                <?php foreach ($livres as $index => $livre): ?>
                                    <div class="carousel-item <?php echo ($index === 0) ? 'active' : ''; ?>">
                                        <a href="accueuil.php">
                                            <img src="images-couvertures/<?php echo $livre['photo']; ?>" class="d-block w-100" alt="<?php echo $livre['titre']; ?>">
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#monCarrousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#monCarrousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>

                        </div>
                    
                </div> 
            <div class="col-3"> 
                <?php require_once "./php/login.php"; ?>
            </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>