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
    $commande = getTraverseesBynumero($_GET['numeroTraversee']);
    include("$racine/vue/entete.html.php");

    if(empty($_POST))
    {
        include("$racine/vue/commande.html.php");
    }
    else
    {
        extract($_POST);
        //FINISH THIS.
        if(empty($_GET['confirmation']))
        {
            if($prix = getPrix($a1, $commande['CodeLiaison'], 1, 1, 6) + getPrix($a2,$commande['codeLiaison'], 1, 2, 6) + getPrix($a3,$commande['CodeLiaison'] ,1, 3, 6) + getPrix($b1,$commande['CodeLiaison'],2, 1, 6) + getPrix($b2,$commande['CodeLiaison'],2, 2, 6))
            {
                include("$racine/vue/prix.html.php");
            }
        }
       // $categories = getAllCategories();
        
        /**
         * @todo A CLEAN A DONF LA CEST PAS OUF AUCUNE GESTION DES ERREURS RIEN.(ET REMPLIR LA BDD POUR TOUT LES RESERVATIONS)
         */
        if(!$idR = setReservation($date, $_GET['numeroTraversee']))
        {
             echo "ERREUR!!!(placeholder)";
             die();
        }
            setStocker($idR, 1,1, $a1);
            setStocker($idR, 1,2, $a2);
            setStocker($idR, 1,3, $a3);
            setStocker($idR, 2,1, $b1);
            setStocker($idR, 2,2, $b2);
        
    }
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