<?php
// fichier crée par sofiane


// sofiane - permet d'avoir toutes les traversées
function getTraversees()
{
 // A COMPLETER
 try
 {
    $traversees = array();
    $co = connexionPDO();  
    $request = $co->query("SELECT * FROM traversee");


    while($tableau = $request->fetch(PDO::FETCH_ASSOC))
    {
        $traversees[] = $tableau;
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

?>