<?php
include("bd.inc.php");

function createUser($mail, $cp, $mdp, $ville, $nom)
{
    $co = connexionPDO();

    $req = $co->prepare("SELECT AdresseMail FROM client WHERE AdresseMail = ?");
    $req->execute([$mail]);
    $user = $req->fetch();

    if($user)
    {
        $message = "Un compte existe déjà avec ce mail.";
        return $message;
    }
    else
    {
    $req = $co->prepare("INSERT INTO client(IdClient ,Nom, AdresseMail, CP, Ville, motPasse) VALUES(:id ,:nom, :adr, :cp, :vil, :mdp)");
    $req->execute(array(
        ':id' => 0,
        ':nom' => $nom,
        ':adr' => $mail,
        ':cp'  => $cp,
        ':vil' => $ville,
        ':mdp' => $mdp
    ));
    }

}


function updateMdp()
{

}


?>