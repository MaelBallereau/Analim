<?php
include_once './Modele/Database.php';
include_once './Modele/Congressiste.php';
include_once './Modele/Session.php';

$session = new Session();


$congressiste = new Congressiste();
$inscritWithSessions = $congressiste->getAllInscritWithSessions();


include_once './Vue/list-inscrit.php';
