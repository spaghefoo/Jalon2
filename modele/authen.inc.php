<?php
//Ici seront créer les fonctions qui permettent la connexion et la deconnexion
include_once "utilisateur.inc.php";

function login($mailU, $mdpU) {
    if (!isset($_SESSION)) {
        session_start();
    }

    $util = getUtilisateurByMailU($mailU);
    $mdpBD = $util["motPasse"] ?? 'default value'; // astuce trouvé sur internet pour eviter un warning ": Trying to access array offset on value of type bool"
    #echo "MOT DE PASSE1"."mdpU=".$mdpU,"mdpBD=".$mdpBD."<br>";
    #echo "MOT DE PASSE2=".crypt($mdpU,$mdpBD)."<br>";
    if (trim($mdpBD) == trim(crypt($mdpU, $mdpBD))) {
        // le mot de passe est celui de l'utilisateur dans la base de donnees
        $_SESSION["mailU"] = $mailU;
        $_SESSION["mdpU"] = $mdpBD;
    }
}

function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["mailU"]);
    unset($_SESSION["mdpU"]);
}

function getMailULoggedOn(){
    if (isLoggedOn()){
        $ret = $_SESSION["mailU"];
    }
    else {
        $ret = "";
    }
    return $ret;
        
}

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["mailU"])) {
        $util = getUtilisateurByMailU($_SESSION["mailU"]);
        if ($util["AdresseMail"] == $_SESSION["mailU"] && $util["motPasse"] == $_SESSION["mdpU"]
        ) {
            $ret = true;
        }
    }
    return $ret;
}
?>