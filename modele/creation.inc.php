<?php
include("bd.inc.php");

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
    else
    {
        try
        {
        $req = $co->prepare("INSERT INTO client(IdClient ,Nom, AdresseMail, CP, Ville, motPasse) VALUES(:id ,:nom, :adr, :cp, :vil, :mdp)");
        $req->execute(array(
            ':id' => 0, //AUTO INCREMENT PT A FIX PLUS TARD
            ':nom' => $nom,
            ':adr' => $mail,
            ':cp'  => $cp,
            ':vil' => $ville,
            ':mdp' => $mdp
        ));
        }
        catch (PDOException $e)
        {
            $message = $e->getMessage();
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

    try
    {
        $req = connexionPDO();
        $req->prepare("UPDATE client SET motPasse = ? WHERE AdresseMail = ?");
        $req->execute([$mdp, $mail]);
        $mesage = 'Mise a jour du mot de passe reussie';
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


?>