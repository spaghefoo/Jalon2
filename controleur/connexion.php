<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authen.inc.php";

if (isset($_POST["mailU"]) && isset($_POST["mdpU"])){
    $mailU=$_POST["mailU"];
    $mdpU=$_POST["mdpU"];
} 
else {
    $mailU="";
    $mdpU="";
}

login($mailU,$mdpU);

if (isLoggedOn()){ // si l'utilisateur est connecté on redirige vers le controleur monProfil
    include "$racine/vue/entete.html.php";
    echo "connecter";
    include "$racine/vue/pied.html.php";
}
else{ // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    // appel du script de vue 
    $titre = "authentification";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueAuthentification.php";
    include "$racine/vue/pied.html.php";
    echo "pas co";
}

?>