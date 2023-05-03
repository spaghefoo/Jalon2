<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
} // 1 - permet de naviguer entre les dossiers
include_once "$racine/modele/panelAdmin.php";

$AffichageLiaison = getLiaison();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CodeLiaison = $_POST["CodeLiaison"];
    $DistanceEnMillesMarin = $_POST["DistanceEnMillesMarin"];
    $IdPort = $_POST["IdPort"];
    $IdPort_1 = $_POST["IdPort_1"];
    $IdSecteur = $_POST["IdSecteur"];

    setAjoutLiaison($CodeLiaison, $DistanceEnMillesMarin, $IdPort, $IdPort_1, $IdSecteur);
}
 
$titre = "Marie Team - Panel Administrateur - Liaison";
include("$racine/vue/entete.html.php");
include("$racine/vue/vuePanelLiaison.php");
include("$racine/vue/pied.html.php");
?>
