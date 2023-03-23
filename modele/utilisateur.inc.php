<?php
include_once "bd.inc.php";

/**
 * modele de gestion des utilisateurs (hors creation).
 * 
 * @author Galdric Tingaud
 * @author Sofiane Acheraiou
 * @author Théophane Legrand
 * 
 */

// TOUT LES UTILISATEURS
 /**
     * Recupere la liste de tous les utilisateurs inscrits.
     * @return Array l'utilisateur.
     */
function getUtilisateurs() {
   
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from client");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(   PDO::FETCH_ASSOC);
            // test
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

// PERMET DE RETROUVER UN UTILISATEUR A PARTIR DE SON MAIL

 /**
     * Permet de recupérer un utilisateur par son mail.
     * 
     * @param String $mailU, le mail de l'utilisateur
     * 
     * @return Array Renvoie l'utilisateur cherché.
     */
function getUtilisateurByMailU($mailU) {
   
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from client where AdresseMail=:AdresseMail");
        $req->bindValue(':AdresseMail', $mailU, PDO::PARAM_STR);
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

// PERMET DE TROUVER UN UTILISATEUR PAR SON ID
/**
 * @deprecated Est inutile(on peut recuperer un utilisateur par son mail. plus pertinent).
 */
function getUtilisateurById()
{

}
?>