<?php
include_once './Modele/Database.php';
include_once './Modele/Congressiste.php';
include_once './Modele/Session.php';


$sessionModel = new Session();
$sessions = $sessionModel->getSessions();


$congressisteObj = new Congressiste();

// Récupération des données
$congressistes = $congressisteObj->GetallCongressiste();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs du formulaire
    $congressiste_id = $_POST['congressiste_id'];
    $session_id = $_POST['session_id'];

    // Valider les données
    if (!empty($congressiste_id) && !empty($session_id)) {
        try {
            // Instancier un objet Congressiste
            $congressiste = new Congressiste();
            $congressiste->setId($congressiste_id);


            $congressiste->registerToSession($session_id);

            // Message de succès

        } catch (Exception $e) {
            'Erreur: ' . $e->getMessage();
        }
    }
}
include_once './Vue/inscription.php';
