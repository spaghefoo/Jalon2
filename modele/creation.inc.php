<?php
include_once("bd.inc.php");

// PERMET DE CREER UN UTILISATEUR DANS LA BASE DE DONNEES
function createUser($mail, $cp, $mdp, $ville, $nom)
{
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