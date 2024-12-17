<?php
function controleurPrincipal($action)
{
    $lesActions = array();
    $lesActions["defaut"] = "controleurSession.php";
    $lesActions["create"] = "controleurCreate.php";
    $lesActions["update"] = "controleurUpdate.php";
    $lesActions["delete"] = "controleurDelete.php";
    $lesActions["congressiste"] = "controleurCongressiste.php";
    $lesActions["inscrit"] = "controleurInscrit.php";


    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } else {
        return $lesActions["defaut"];
    }
}
