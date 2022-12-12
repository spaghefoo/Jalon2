<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
} // 1 - permet de naviguer entre les dossiers
include_once "$racine/modele/authen.inc.php";
include_once "$racine/modele/destination.inc.php";



if(isLoggedOn())
{
    $titre = "Marie team - Commande";
    $commande = getTraverseesBynumero($_GET['numeroD']);
    include("$racine/vue/entete.html.php");
    include("$racine/vue/commande.html.php");
    include("$racine/vue/pied.html.php");
}
else
{
    $titre = "Marie Team - INTERDIT";
    include("$racine/vue/entete.html.php");
    include("$racine/vue/vueVousDevezEtreConnecte.php");
    include("$racine/vue/pied.html.php");
}
?>