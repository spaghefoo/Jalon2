<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
} // 1 - permet de naviguer entre les dossiers
include_once "$racine/modele/authen.inc.php";
include_once "$racine/modele/destination.inc.php";
include_once "$racine/modele/reservation.inc.php";



if(isLoggedOn())
{
    $titre = "Marie team - Commande";
    $commande = getTraverseesBynumero($_GET['numeroD']);
    if(empty($_POST))
    {
        include("$racine/vue/commande.html.php");
    }
    else
    {
        extract($_POST);
        //FINISH THIS.
        setReservation($date, $_GET['numeroTraversee'], $a1, 1, 1);
        setReservation($date, $_GET['numeroTraversee'], $a2, 1, 2);
        setReservation($date, $_GET['numeroTraversee'], $a3, 1, 3);
        setReservation($date, $_GET['numeroTraversee'], $b1, 2, 1);
        setReservation($date, $_GET['numeroTraversee'], $b2, 2, 2);
    }
    include("$racine/vue/entete.html.php");
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