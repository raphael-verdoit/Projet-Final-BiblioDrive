<?php
// 1. Démarrer la session au tout début
session_start();

// 2. Inclure la connexion à la base de données
require "db.php";

if (isset($_POST['login_submit'])){
    $email = $_POST['email'];
    $mdp = $_POST['pass'];

    // 3. Préparer la requête (Correction du nom de variable : $sql au lieu de $sql_login)
    // On récupère aussi nom et prenom pour l'affichage dans le dashboard
    $sql = 'SELECT * FROM utilisateur WHERE mel = ?';
    
    try {
        $stmt = $connexion->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_OBJ);

        // 4. Vérifier si l'utilisateur existe ET si le mot de passe est bon
        if ($user && $mdp === $user->motdepasse) {
            // Authentification réussie
            
            // 5. Enregistrer les informations en session (requis par dashboard.php)
            $_SESSION['user_email'] = $user->mel;
            $_SESSION['user_name']  = $user->prenom . ' ' . $user->nom;

            // 6. Redirection vers le tableau de bord
            header('Location: dashboard.php');
            exit();

        } else {
            // Échec de connexion
            echo "Email ou mot de passe incorrect.";
            // Vous pouvez ajouter un lien de retour : <a href='../accueuil.php'>Retour</a>
        }
    } catch (Exception $e) {
        echo "Erreur lors de la connexion : " . $e->getMessage();
    }
}
?>
