<?php
function controleurPrincipal($action){
    $lesActions = array();
    // exemples de page a crée
    $lesActions["defaut"] = "accueil.php"; // Accueil
    $lesActions["connexion"] = "connexion.php"; // formulaire connexion
    $lesActions["deconnexion"] = "deconnexion.php"; // formulaire Déconnexion
    $lesActions["profil"] = "monProfil.php"; // Profil
    $lesActions["qui-sommes-nous"] = "QuiSommesNous.php"; // page à propos
    $lesActions["destinations"] = "destinations.php"; // formulaire destinatoins
    $lesActions["inscription"] = "inscription.php"; // Formulaire inscrption
    $lesActions["detail-reservation"] = "reservation.php"; // page reservation
    $lesActions['mesReservations'] = "mesReservations.php"; //page mesReservations
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"]; // Si on essaye d'acceder a une page qui existe pas alors on va a l'accueil...
    }
}
?>