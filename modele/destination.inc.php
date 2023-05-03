<?php
// fichier crée par sofiane

/**
 * modele de gestion des destinations
 * 
 * @author Galdric Tingaud
 * @author Sofiane Acheraiou
 * @author Théophane Legrand
 * 
 */

include_once("bd.inc.php");

//permet d'avoir toutes les traversées

 /**
     * Fonction qui recupere toutes les traversées.
     * 
     * @return traversees Array, Recupere tous les traversées et les recupere dans un tableau.
     */
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


 /**
     * 
     * Recupere les traversées par en fonction du numéro de la traversée.
     * 
     * @param numero Int, Numero de la traversée 
     * @return traversees Array, Recupere les données de la traversées
     */
function getTraverseesBynumero($numero)
{
   
    
    // A COMPLETER AS WELL
    try
    {
        $co = connexionPDO();
        $prepare = $co->prepare("SELECT * FROM traversee WHERE numeroTraversee = :numero");
        $prepare->bindValue(':numero', $numero, PDO::PARAM_INT);
        $prepare->execute();
        $traversee = $prepare->fetch(PDO::FETCH_ASSOC);
        //print_r($traversee);
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

   /**
     * Recupere Toutes les traversées correspondant à un secteur.
     * @param String $secteur, Recupere le secteur de ou des traversées.
     * @return fetch Array, Toutes les traversées qui correspondent à un secteur dans un tableau.
     * 
     */
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

/**
 * 
 * Récupere le nombre de places par voyages
 * 
 * @param int $numeroTraversee
 * @param int $categorie, numero de la catégorie(1 = A, 2 = B, 3 = C);
 */

function getNbrPlacesTotalPerVoyage($numeroTraversee, $categorie)
{
   
    try
    {
        $array = array();
        $co = connexionPDO();
        $query = "SELECT traversee.numeroTraversee, bateau.IdBateau, contenir.IdCategorie, contenir.IdType as Idcate, contenir.QuantiteMaxDisponible AS qte FROM traversee INNER JOIN bateau ON traversee.IdBateau = bateau.IdBateau INNER JOIN contenir ON bateau.IdBateau = contenir.idBateau AND contenir.IdCategorie = :idc WHERE numeroTraversee = :trav";
        $prepare = $co->prepare($query);
        $prepare->bindValue(':trav', $numeroTraversee);
        $prepare->bindValue(':idc', $categorie);
        $prepare->execute();
        $result = $prepare->fetch(PDO::FETCH_ASSOC);
        while($result)
        {
            $list = $result['Idcate'];
            $array[''.$list.''] = $result['qte'];
            $result = $prepare->fetch(PDO::FETCH_ASSOC);
        }
    }   
    catch(PDOException $e)
    {
        echo "Erreur !: ".$e->getMessage();
    }
    finally
    {
        $co = null;
    }
    return $array;
}


  /**
     *   Cette fonction prend un nombre qui correspond au numeroTraversee
     *   une lettre(correspond au type(Passages, vehicules etc...))
     *   et un chiffre(sous-catégorie: adulte, enfants,, vehicules inferieur a 2 metres...)
     *   puis retourne le resultat de la requete sql.
     * 
     *  @param id Int, numero de la traversée
     *  @param type Char, Type de catégorie('A', 'B' ou 'C')
     *  @param sousCategorie Int, numero de la sous-catégorie(1,2,3)
     * 
     *  @return int Renvoie le nombre de places disponibles dans un simple int. 
     */
function getPlacesDisponiblesById($id, $type, $sousCategorie)
{
  
    try
    {
        switch($type)
        {
            case 'A':
                $idcate = 1;
                break;
            case 'B':
                $idcate = 2;
                break;
            case 'C':
                $idcate = 3;
                break;
        }
        $complet = $type.$sousCategorie; // A2.
        $co = connexionPDO();
        $sql = "SELECT SUM(stocker.Quantite) as quantite, traversee.idBateau as Bateau FROM stocker INNER JOIN reservation ON stocker.idReservation = reservation.IdReservation INNER JOIN traversee ON reservation.numeroTraversee = traversee.numeroTraversee AND traversee.numeroTraversee = :id WHERE stocker.IdType = :idType"; 
        $prepare = $co->prepare($sql);
        $prepare->bindValue(":id", $id);
        $prepare->bindValue(":idType", $complet);
        $prepare->execute();
        $fetch = $prepare->fetch(PDO::FETCH_ASSOC);
        
        $array_places = getNbrPlacesTotalPerVoyage($id, $idcate);
        //print_r($array_places);
        $qte_max = $array_places[''.$complet.''];

        if($fetch['quantite'] == NULL)
        {
            $qte_pris = 0;
        }
        else
        {
            $qte_pris = $fetch['quantite'];
        }

        // nombre de places restantes dans le bateau du trajet

        // $sql = "SELECT IdType , IdBateau, QuantiteMaxDisponible as maxdisp FROM contenir WHERE IdType = :idType AND IdBateau = :bateau";
        // $prepare = $co->prepare($sql);
        // $prepare->bindValue(":idType", $complet);
        // $prepare->bindValue(":bateau", $fetch['Bateau']);
        // $prepare->execute();
        // $fetch_qte_max = $prepare->fetch(PDO::FETCH_ASSOC);
                    
        // $qte_max = $fetch_qte_max['maxdisp'];
      
       // print_r($fetch_qte_max);
       // print_r($fetch);

    }
    catch(PDOException $e)
    {
        return $e->getMessage();
    }
    finally
    {
        $co = null;
    }
   
    return $qte_max - $qte_pris;
}

  /**
     * Recupere tous les catégories transportées par la compagnie(Bateaux, Passagers...)
     * Ainsi que leurs sous catégories.
     * 
     * 
     * @return result Array.
     */
function getAllCategories()
{

  
    try
    {
        $co = connexionPDO();
        $sql = "SELECT IdType FROM type";
        $execute = $co->execute($sql);
        $result = $execute->fetchAll(PDO::FETCH_NUM);
    }
    catch(PDOException $e)
    {
        echo "Erreur:".$e->getMessage();
    }
    finally
    {
        $co = null;
    }
    
    return $result;
}
//print_r(getNbrPlacesTotalPerVoyage(1,1));
//echo 'Catégorie A3 numeroTraversée 1: places restantes';
//print_r(getPlacesDisponiblesById(1, "B", 1));
?>