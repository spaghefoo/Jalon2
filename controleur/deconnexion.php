<?php
if($_SERVER["SCRIPT_FILENAME"] ==  __FILE__){
    $racine="..";
} // 1 - permet de naviguer entre les dossiers
include_once "$racine/modele/authen.inc.php";

// 2 - recuperation des donnees GET, POST, et SESSION
;

//3 - appel de la fonction qui permet la deconnexion
logout();

// 4 - traitement si necessaire des donnees recuperees

// 5 - appel du script qui gère l'affichage des donnees
include "$racine/vue/entete.html.php";
include "$racine/vue/vueAccueil.php";
include "$racine/vue/pied.html.php";
?>