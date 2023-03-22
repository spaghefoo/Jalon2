<?php
// Fichier crée par sofiane

/**
 * @author ACHERAIOU Sofiane
 * 
 * Ce fichier permet d'avoir une liste en json de toutes les destinations pour récuperation dans la vue.
 */
include_once('bd.inc.php');
// sofiane - cette ligne d'indiquer au navigateur qu'il s'agit d'un fichier json(alors que c'est du php mdr)

// en soi ça change rien mais c'est plus propre.

//voir https://www.php.net/manual/fr/function.header.php
header('Content-Type: application/json'); 

try
{
    $co = connexionPDO(); // on se connecte
    $query = $co->query("SELECT nomSecteur FROM secteur"); // on recupere tout de la table secteur
    $fetch = $query->fetchAll(PDO::FETCH_NUM); // On met tt dans un tableau
    echo json_encode($fetch); // on encode en json
}
catch(PDOException $e)
{
    echo json_encode($e->getMessage()); // si y'a erreur
}
finally
{
    $co = null;
}

?>