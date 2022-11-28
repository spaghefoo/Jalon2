<?php
// Fichier crée par sofiane
include_once('bd.inc.php');
try
{
    $co = connexionPDO(); // on se connecte
    $query = $co->query("SELECT nomSecteur FROM secteur"); // on recupere tout de la table secteur
    $fetch = $query->fetchAll(PDO::FETCH_NUM); // On met tt dans un tableau
    echo json_encode($fetch); // on encode en json
}
catch(PDOException $e)
{
    json_encode($e->getMessage()); // si y'a erreur
}
finally
{
    $co = null;
}

?>