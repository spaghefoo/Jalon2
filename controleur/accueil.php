<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
} // 1 - permet de naviguer entre les dossiers
include_once "$racine/modele/bd.inc.php";

// 2 - recuperation des donnees GET, POST, et SESSION

// 3 - appel des fonctions permettant de recuperer les donnees utiles a l'affichage
# Galdric : Pour l'instant rien
#$listeRestos = getRestos();

// 4 - traitement si necessaire des donnees recuperees
;
// Galdric : Pour l'instant rien

// 5 - appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Marie Team - Page d'accueil";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueAccueil.php";
include "$racine/vue/pied.html.php";
?>