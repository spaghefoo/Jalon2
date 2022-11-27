<?php
function controleurPrincipal($action){
    $lesActions = array();
    // exemples de page a crée
    $lesActions["defaut"] = "accueil.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["profil"] = "monProfil.php";
    $lesActions["qui-sommes-nous"] = "QuiSommesNous.php";
    $lesActions["destinations"] = "destinations.php";
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }
}
?>