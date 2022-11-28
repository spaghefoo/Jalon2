<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
} 

//include_once "$racine/modele/reservation.inc.php";


    //$mailU = getMailULoggedOn();
    //$util = getUtilisateurByMailU($mailU);

    //ICI ON APPELLE LA FONCTION GETRESERVATIONIDUTILISATEUR QUI VA RECUPERER LA LISTE DES RESERVATIONS QUI DEPEND DE LUTILISATEUR
  //  $listeReservations = getReservationIdUtilisateur($mailU);

include("$racine/vue/entete.html.php");
include("$racine/vue/vueMesReservations.php");
include("$racine/vue/pied.html.php");

?>