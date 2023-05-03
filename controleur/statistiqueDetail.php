<?php
// Détail d'une réservation
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
} // 1 - permet de naviguer entre les dossiers
include_once "$racine/modele/panelAdmin.php";

if (isLoggedOn()) {
    $titre = "Marie team - Détail Statistique";
    include("$racine/vue/entete.html.php");
    include("$racine/vue/vueDetailStatistique.php");
    include("$racine/vue/pied.html.php");
} else { // On doit être connecté - on peut pas voir les reservations
    $titre = "Marie Team - INTERDIT";
    include("$racine/vue/entete.html.php");
    include("$racine/vue/vueVousDevezEtreConnecte.php");
    include("$racine/vue/pied.html.php");
}
