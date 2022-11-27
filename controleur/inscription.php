<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
} // 1 - permet de naviguer entre les dossiers
include_once "$racine/modele/creation.inc.php";

// 2 - recuperation des donnees GET, POST, et SESSION

// 3 - appel des fonctions permettant de recuperer les donnees utiles a l'affichage

// 4 - traitement si necessaire des donnees recuperees
if(isset($_POST))
{
    // sofiane - je finis la fonction d'inscription. j'ai assigné les variables dans la vue inscription
    $user = $_POST['createUserMail'];
    $passwd = $_POST['createUserPassword'];
    $retour = createUser($user, $passwd); // La fonction retourne un message en fonction de si ça a reussi ou pas, on peut essayer de le mettre qq part?
}

// 5 - appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Créer un compte";
include("$racine/vue/entete.html.php");
include("$racine/vue/pied.html.php");
include("$racine/vue/vueInscription.php");

?>