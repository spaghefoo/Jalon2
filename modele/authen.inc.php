<?php

/**
 * Modele authentification Marieteam.
 * @author Galdric Tingaud
 * @author Théophane Legrand
 * @author Sofiane Acheraiou
 */


//Ici seront créer les fonctions qui permettent la connexion et la deconnexion
include_once "utilisateur.inc.php";


/**
 *
 * Permet la connexion de l'utilisateur qui tente de se connecter.
 * Le mot de passe est chiffré dans la fonction.
 * Puis insere dans la variable de session le nom d'utilisateur et le mot de passe chiffré.
 * 
 * @param String $mailU
 * @param String $mdpU
 * @return void
 */
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

 /**
     * 
     * 
     * La fonction ne prend aucun parametre. 
     * Enleve les variables de session mis lors de la connexion.
     * Et déconnecte l'utilisateur.
     * @return void
     * 
     * 
     */
function logout() {
   
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["mailU"]);
    unset($_SESSION["mdpU"]);
}

   /**
     * La fonction retourne le mail de l'utilisateur actuellement connecté
     * Si l'utilisateur n'est pas connecté alors la valeur renvoyée est vide.
     * @var String $ret Contient l'email de l'utilisateur. vide ou egal a la variable de session mailU.
     * @return String $ret
     * 
     * 
     */
function getMailULoggedOn(){

 
    if (isLoggedOn()){
        $ret = $_SESSION["mailU"];
    }
    else {
        $ret = "";
    }
    return $ret;

}

  /**
     * Si la session est active et que Le mail utilisateur de la variable de session
     * Correspond a celle trouvé par la fonction getUtilisateurByMailU
     * Alors la fonction renvoie truc, sinon false.
     * 
     * @return boolean $ret 
     * 
     * 
     */
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