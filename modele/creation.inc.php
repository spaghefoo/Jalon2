<?php
include("bd.inc.php");

function createUser($mail, $cp, $mdp, $ville, $nom)
{
    $co = connexionPDO();

    $req = $co->prepare("SELECT AdresseMail FROM client WHERE AdresseMail = ?");
    $req->execute([$mail]);
    $user = $req->fetch();

    if($user['AdresseMail'])
    {
        $message = "Un compte existe déjà avec ce mail.";
    }
    else
    {
    $req = $co->prepare("INSERT INTO client(Nom, AdresseMail, CP, Ville, motPasse) VALUES(:nom, :adr, :cp, :vil, :mdp)");
    $req->execute(array(
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