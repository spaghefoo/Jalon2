<?php
//Ici seront créer les fonctions qui permettent la connexion et la deconnexion
include_once "utilisateur.inc.php";

function login($mailU, $mdpU) {
    if (!isset($_SESSION)) {
        session_start();
    }

    $util = getUtilisateurByMailU($mailU);
    $mdpBD = $util["motPasse"] ?? 'default value'; // astuce trouvé sur internet pour eviter un warning ": Trying to access array offset on value of type bool"
    if (trim($mdpBD) == trim(crypt($mdpU, $mdpBD))) {
        // le mot de passe est celui de l'utilisateur dans la base de donnees
        $_SESSION["AdresseMail"] = $mailU;
        $_SESSION["motPasse"] = $mdpBD;
    }
}

function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["AdresseMail"]);
    unset($_SESSION["motPasse"]);
}

function getMailULoggedOn(){
    if (isLoggedOn()){
        $ret = $_SESSION["AdresseMail"];
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

    if (isset($_SESSION["AdresseMail"])) {
        $util = getUtilisateurByMailU($_SESSION["motPasse"]);
        if ($util["AdresseMail"] == $_SESSION["AdresseMail"] && $util["motPasse"] == $_SESSION["motPasse"]
        ) {
            $ret = true;
        }
    }
    return $ret;
}
?>