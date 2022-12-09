<?php
// fichier crée par sofiane

//sofiane - G OUBLIE LE INCLUDE LOL
include_once("bd.inc.php");

// sofiane - permet d'avoir toutes les traversées
function getTraversees()
{
 try
 {
    $traversees = array();
    $co = connexionPDO();  
    $request = $co->query("SELECT * FROM traversee");


    while($tableau = $request->fetch(PDO::FETCH_ASSOC))
    {
        $traversees[] = $tableau; //la liste des traversées...
    }
 }
 catch(PDOException $e)
 {
    $message = $e->getMessage();
    $traversees = false;
 }
 finally{
    $co = null;
 }
 return $traversees;
}

// sofiane - permet d'avoir une traversée par un numéro
function getTraverseesBynumero($numero)
{
    // A COMPLETER AS WELL
    try
    {
    $co = connexionPDO();
    $co->prepare("SELECT * FROM traversee WHERE numeroTraversee = ?");
    $co->execute([$numero]);

    while($tableau = $request->fetch(PDO::FETCH_ASSOC))
    {
        $traversee[] = $tableau;
    }
    }
    catch(PDOException $e)
    {
        $message = $e->getMessage();
    }
    finally
    {
        $co = null;
    }
    return $traversee;
}

// permet d'avoir les traversées par secteur
function getAllTraverseesBySecteur($secteur)
{
    try
    {
        $co = connexionPDO();
        //sofiane - REMPLACER PAR UNE VUE EN VRAI CA SERAIT MIEUX JE PENSE!!!!!!!!!!!!!!!
        $prepare =$co->prepare('SELECT traversee.numeroTraversee, traversee.CodeLiaison, liaison.CodeLiaison, traversee.dateTraversee, traversee.heureTraversee, liaison.DistanceEnMillesMarin, secteur.nomSecteur, portDepart.libellePort AS libelleDepart, portArrivee.libellePort AS libelleArrivee FROM traversee, liaison INNER JOIN secteur ON secteur.nomSecteur LIKE :sect AND liaison.IdSecteur = secteur.IdSecteur INNER JOIN port AS portDepart ON liaison.idPort = portDepart.idPort INNER JOIN port AS portArrivee ON liaison.IdPort_1 = portArrivee.IdPort WHERE traversee.dateTraversee > :date');
        $prepare->bindValue(":sect", $secteur, PDO::PARAM_STR);
        $prepare->bindValue(":date", date('Y-m-d'));
        $prepare->execute();
        $fetch =  $prepare->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e)
    {
        return $e->getMessage();   
    }
    finally
    {
        $co = null;
    }
    return $fetch;
}

?>