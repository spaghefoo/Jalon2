<?php
/** 
 * Controleur Principal
 * @author Galdric Tingaud - Theophane Legrand - Sofiane Acheraiou
 * @author 
 * 
*/
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
    $lesActions['commander'] = "commande.php"; //page commande
    $lesActions['rgpd'] = "RGPD.php"; //page rgpd
    $lesActions['panelAdmin'] = "panelAdmin.php"; //page paneladmin
    $lesActions['panelStat'] = "panelStat.php"; //page panelstat
    $lesActions['panelLiaison'] = "panelLiaison.php"; //page panelLiaison
    $lesActions['detail-liaison'] = "liaisonDetail.php"; //page des détails de la liaison
    $lesActions['detail-statistique'] = "statistiqueDetail.php"; //page des statistiques de date


    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"]; // Si on essaye d'acceder a une page qui existe pas alors on va a l'accueil...
    }
}
?>