<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/modele/creation.inc.php";

$titre = "Créer un compte";

if(isset($_POST))
{
    createUser();
}

include("$racine/vue/entete.html.php");
include("$racine/vue/pied.html.php");
include("$racine/vue/");

?>