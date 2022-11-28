<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
} // 1 - permet de naviguer entre les dossiers
include_once "$racine/modele/authen.inc.php";
include_once "$racine/modele/utilisateur.inc.php";

// 2 - recuperation des donnees GET, POST, et SESSION
;

// 3 - appel des fonctions permettant de recuperer les donnees utiles a l'affichage
if (isLoggedOn()) {
    $mailU = getMailULoggedOn();
    $util = getUtilisateurByMailU($mailU);

// 4 - traitement si necessaire des donnees recuperees

// 5 - appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Marie Team - Profil";
    include_once "$racine/vue/entete.html.php";
    include_once "$racine/vue/vuemonProfil.php";
    include_once "$racine/vue/pied.html.php";
}
else
{
    include_once "$racine/vue/entete.html.php";
    include_once "$racine/vue/vueAuthentification.php";
    include_once "$racine/vue/pied.html.php";
}
?>