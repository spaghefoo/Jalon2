<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
} // 1 - permet de naviguer entre les dossiers
include_once "$racine/modele/panelAdmin.php";

// 2 - récupération des données GET, POST, et SESSION
$dateTraversee = isset($_GET['dateTraversee']) ? $_GET['dateTraversee'] : null;
if (!$dateTraversee) {
    $dateTraversee = date('Y-m-d');
}

// 3 - appel des fonctions permettant de récupérer les données utiles à l'affichage
$statistique = getStatistique($dateTraversee);

// 4 - traitement si nécessaire des données récupérées

// 5 - appel du script de vue qui permet de gérer l'affichage des données
$titre = "Marie Team - Panel Administrateur - Statistique";
include "$racine/vue/entete.html.php";
include "$racine/vue/vuePanelStat.php";
include "$racine/vue/pied.html.php";
?>
