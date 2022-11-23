<?php

function controleurPrincipal($action){
    $lesActions = array();

    // exemples de page a crée
    $lesActions["profil"] = "monProfil.php";
    $lesActions["default"] = "index.php";
    $lesActions["acceuil"] = "index.php";
    $lesActions["connexion"] = "connexion.php";
    
    if (array_key_exists ($action , $lesActions)){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>