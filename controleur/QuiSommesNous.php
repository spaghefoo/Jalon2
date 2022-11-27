<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
} // 1 - permet de naviguer entre les dossiers

// 2 - recuperation des donnees GET, POST, et SESSION

// 3 - appel des fonctions permettant de recuperer les donnees utiles a l'affichage

// 4 - traitement si necessaire des donnees recuperees

// 5 - appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Marie Team - Qui sommes nous ?";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueQuiSommesNous.php";
include "$racine/vue/pied.html.php";


?>