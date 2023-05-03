<?php
// Détail d'une réservation
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";   
} // 1 - permet de naviguer entre les dossiers
include_once "$racine/modele/panelAdmin.php";

// 2 - recuperation des donnees GET, POST, et SESSION
if (isset($_GET["CodeLiaison"])){
    $CodeLiaison=$_GET["CodeLiaison"];
}
else {
    $CodeLiaison="";
}
// 3 - appel des fonctions permettant de recuperer les donnees utiles a l'affichage
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $CodeLiaison = $_POST["CodeLiaison"];
        $distance = $_POST["DistanceEnMillesMarin"];
        $IdPort1 = $_POST["IdPort"];
        $IdPort2 = $_POST["IdPort_1"];
        $IdSecteur = $_POST["IdSecteur"];
    
        $ModificationLiaison = setModificationLiaison($distance, $IdPort1, $IdPort2, $IdSecteur, $CodeLiaison);
    }
if (isLoggedOn()) {
    $listeDetailsLiaison = getDetailLiaisonById($CodeLiaison);
    $liaison = $listeDetailsLiaison[0]; // Récupère la première liaison de la liste

    

// 4 - traitement si necessaire des donnees recuperees

// 5 - appel du script de vue qui permet de gerer l'affichage des donnees

    $titre = "Marie team - Détail d'une liaison";
    include("$racine/vue/entete.html.php");
    include("$racine/vue/vueDetailLiaison.php");
    include("$racine/vue/pied.html.php");
}
else { // On doit être connecté - on peut pas voir les reservations
    $titre = "Marie Team - INTERDIT";
    include("$racine/vue/entete.html.php");
    include("$racine/vue/vueVousDevezEtreConnecte.php");
    include("$racine/vue/pied.html.php");
}
?>