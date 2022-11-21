<?php
if($_SERVER["SCRIPT_FILENAME"] ==  __FILE__){
    $racine="..";
} // permet de naviguer entre les dossiers
include_once "$racine/modele/authen.inc.php";

//appel de la fonction qui permet la deconnexion 
logout(); 

//appel du script qui gère l'affichage des donnees
include "$racine/vue/entete.php";
include "$racine/vue/vueAuthentification.php";
include "$racine/vue/pied.php";
?>