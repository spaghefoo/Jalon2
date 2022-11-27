<?php
// fichier crée par sofiane


// sofiane - permet d'avoir toutes les traversées
function getTraversees()
{
 // A COMPLETER
 try
 {
 $co = connexionPDO();  
 }
 catch(PDOException $e)
 {
    $message = $e->getMessage();
 }

}

// sofiane - permet d'avoir une traversée par un numéro
function getTraverseesBynumero()
{
    // A COMPLETER AS WELL
    try
    {
    $co = connexionPDO();
    }
    catch(PDOException $e)
    {
        $message = $e->getMessage();
    }
}

?>