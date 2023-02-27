<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
} // 1 - permet de naviguer entre les dossiers
// Mettre les bons include
// sofiane - on appelle le modele destination
include_once("$racine/modele/destination.inc.php");
// 2 - recuperation des donnees GET, POST, et SESSION
if(!empty($_POST))
{
    $desti = $_POST['desti'];
}

// 3 - appel des fonctions permettant de recuperer les donnees utiles a l'affichage    
if(!empty($_POST))
{
    $destination = getAllTraverseesBySecteur($desti);
}
// 4 - traitement si necessaire des donnees recuperees


// 5 - appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Marie team - Liste des destinations";
include("$racine/vue/entete.html.php");
include("$racine/vue/vueDestination.php");
include("$racine/vue/pied.html.php");

?>