<?php

function controleurPrincipal($action){
    $lesActions = array();

    // exemples de page a crée
    // $lesActions["profil"] = "monProfil.php";

    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>