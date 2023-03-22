<?php
include_once("bd.inc.php");

/**
 * modele de création d'utilisateur.
 * 
 * @author Galdric Tingaud
 * @author Sofiane Acheraiou
 * @author Théophane Legrand
 * 
 */

// PERMET DE CREER UN UTILISATEUR DANS LA BASE DE DONNEES
function createUser($mail, $cp, $mdp, $ville, $nom)
{
    /**
     * Fonction de création de l'utilisateur dans la base de données
     * Verifie le mot de passe en fonctoin des règles de sécurité de l'ANSSI. 
     * 12 caractères, une chiffre, une minuscule, une majuscule, un caractère spécial.
     * @param mail String, le mail de l'utilisateur 
     * @param cp Int, le code postal spécifié
     * @param mdp String, mot de passe utilisateur.
     * @param ville String
     * @param nom String
     * 
     * @return message String, message d'erreur en cas de non respect des règles de sécurité du mot de passe.
     * 
     * 
     */
    $co = connexionPDO();

    $req = $co->prepare("SELECT AdresseMail FROM client WHERE AdresseMail = ?");
    $req->execute([$mail]);
    $user = $req->fetch();

    $message = "Compte créé avec succès";

    if($user)
    {
        $message = "Un compte existe déjà avec ce mail.";
    }
    elseif (!verificationMotspasse($mdp)){ // Galdric : vérification que le mot passe respecte les régles de sécurité
        $message = "Le mot passe ne respecte pas les régles de sécurité";
    }
    else
    {
        try
        {
            $req = $co->prepare("INSERT INTO client(Nom, AdresseMail, CP, Ville, motPasse) VALUES(:nom, :adr, :cp, :vil, :mdp)");
            $req->execute(array(
            ':nom' => $nom,
            ':adr' => $mail,
            ':cp'  => $cp, 
            ':vil' => $ville,
            ':mdp' => crypt($mdp, 'gal') // sof - j'ai repris le chiffrement qu'a mis galdric
        ));
        }
        catch (PDOException $e)
        {
            $message = $e->getMessage();
            echo $message;
        }
        finally
        {
            $co = null;
        }
    }
    return $message; //  MESSAGE D'ERREUR
}

// PERMET DE MODIFIER UN MOT DE PASSE D'UTILISATEUR
function updateMdp($mail,$mdp)
{
/**
 * Chiffre et met a jour le mot de passe d'un utilisateur.
 * @param mail String, email de l'utilisateur qui change son mdp
 * @param mdp String, nouvel mdp de l'utilisateur.
 * 
 * @return message String, message de succes/échec changement de mot de passe
 */
    $message = "";

    if (!verificationMotspasse($mdp)){
        $message = "Le mots passe ne respectent pas les régles de sécurité";
    }
    else {
        try{
            $req = connexionPDO();
            $req->prepare("UPDATE client SET motPasse = ? WHERE AdresseMail = ?");
            $req->execute([crypt($mdp, 'gal'), $mail]);
            $message = 'Mise a jour du mot de passe reussie';
        }
        catch(PDOException $e)
        {
            $message = $e->getMessage();
            die();
        }
        finally
        {
            $req = null;
        }

        return $message;
    }
}

// galdric - vérifie que le mots passe resptcent les régles de sécurité
//https://www.web-development-kb-eu.site/fr/php/creer-preg-match-pour-la-validation-du-mot-de-passe-permettant/1068096486/

function verificationMotspasse ($mdp, $min_len = 12, $max_len = 70, $req_digit = 1, $req_lower = 1, $req_upper = 1, $req_symbol = 1) {
    /**
     * Verifie le mot de passe selon les recommandations de l'ANSSI. et renvoie un boolean si correspond au critères.
     * @param mdp, String mdp a verifier
     * @var min_len Nombre de caractere minimal(12)
     * @var max_len Nombre de caractere maximale(70)
     * @var req_digit Nombre requis(1)
     * @var req_lower minuscule requis(1)
     * @var req_upper Majuscule requis(1)
     * @var req_symbol Caractère spécial(1)
     * 
     * @return boolean
     */


    // Construire une chaîne en fonction des exigences pour le mot de passe
    $regex = '/^';// grave au langage regex
    if ($req_digit == 1) { $regex .= '(?=.*\d)'; }              //Fait correspondre au moins 1 chiffre
    if ($req_lower == 1) { $regex .= '(?=.*[a-z])'; }           // Fait correspondre au moins 1 lettre minuscule
    if ($req_upper == 1) { $regex .= '(?=.*[A-Z])'; }           // Fait correspondre au moins 1 lettre majuscule
    if ($req_symbol == 1) { $regex .= '(?=.*[^a-zA-Z\d])'; }    // Fait correspondre au moins 1 caractère qui n'est aucun des éléments ci-dessus
    $regex .= '.{' . $min_len . ',' . $max_len . '}$/';

    if(preg_match($regex, $mdp)) {
        return TRUE;
    } else {
        return FALSE;
    }
}


?>