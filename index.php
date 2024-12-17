<?php
include "./Controler/controleurPrincipal.php";


if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "defaut";
}

$fichier = controleurPrincipal($action);
include "./Controler/$fichier";
