<?php
session_start();
require("db.php");

if (!isset($_SESSION['mel']) || empty($_SESSION['panier'])) {
    header("Location: accueuil.php");
    exit();
}

$mel = $_SESSION['mel'];
$panier = $_SESSION['panier'];
$date_jour = date('Y-m-d');

try {
    $connexion->beginTransaction();

    $sql = "INSERT INTO emprunter (mel, nolivre, dateemprunt) VALUES (:mel, :nolivre, :date)";
    $stmt = $connexion->prepare($sql);

    foreach ($panier as $id_livre) {
        $stmt->execute([
            ':mel' => $mel,
            ':nolivre' => $id_livre,
            ':date' => $date_jour
        ]);
    }

    $connexion->commit();
    
    // On vide le panier après succès
    unset($_SESSION['panier']);
    
    // Redirection avec succès (ou vers une page de confirmation)
    echo "<script>alert('Emprunt validé !'); window.location.href='accueuil.php';</script>";

} catch (PDOException $e) {
    $connexion->rollBack();
    // Gestion simple des erreurs (ex: livre déjà emprunté ce jour)
    die("Erreur lors de l'emprunt : " . $e->getMessage());
}
?>