<?php
include_once './Modele/Session.php';

// Créer une instance du modèle Session
$sessionModel = new Session();

// Récupérer toutes les sessions
$sessions = $sessionModel->getSessions();

// Inclure la vue pour afficher les sessions
include './Vue/list.php';
?>
