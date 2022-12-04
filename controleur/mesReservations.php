<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
} // 1 - permet de naviguer entre les dossiers
include_once "$racine/modele/reservation.inc";

// 2 - recuperation des donnees GET, POST, et SESSION

// 3 - appel des fonctions permettant de recuperer les donnees utiles a l'affichage

if (isLoggedOn()) {
    $mailU = getMailULoggedOn();
    $listeReservations = getReservationsIdUtilisateur($mailU);

// 4 - traitement si necessaire des donnees recuperees


// 5 - appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Marie Team - Mes réservations";
    include("$racine/vue/entete.html.php");
    include("$racine/vue/vueMesReservations.php");
    include("$racine/vue/pied.html.php");
}
else { // On doit être connecté - on peut pas voir les reservations
    $titre = "Marie Team - INTERDIT";
    include("$racine/vue/entete.html.php");
    include("$racine/vue/vueVousDevezEtreConnecte.php");
    include("$racine/vue/pied.html.php");
}
?>