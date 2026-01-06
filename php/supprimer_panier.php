<?php
session_start();
if (isset($_GET['id']) && isset($_SESSION['panier'])) {
    $id = $_GET['id'];
    $key = array_search($id, $_SESSION['panier']);
    if ($key !== false) {
        unset($_SESSION['panier'][$key]);
    }
}
header("Location: panier.php");
?>