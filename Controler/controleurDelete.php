<?php
include_once './Modele/Database.php';
include_once './Modele/Session.php';

// Vérifiez si l'ID a été passé via POST
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Supprimer la session avec l'ID donné
    $sessionModel = new Session();
    $sessionModel->deleteSession($id);

    // Redirection vers la page principale après la suppression
    header('Location: ./');
    exit();
} else {
    echo "Erreur : aucun ID fourni pour la suppression.";
}
