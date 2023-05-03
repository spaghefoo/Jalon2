<?php
include_once("bd.inc.php");

//Fonction qui va insérer des liaisons dans la table liaison
function setAjoutLiaison($CodeLiaison, $DistanceEnMillesMarin, $IdPort, $IdPort_1, $IdSecteur)
{
    try {
        $connexion = connexionPDO();
        $requete = $connexion->prepare("INSERT INTO liaison(CodeLiaison, DistanceEnMillesMarin, IdPort, IdPort_1, IdSecteur) VALUES(:CodeLiaison, :DistanceEnMillesMarin, :IdPort, :IdPort_1, :IdSecteur)");
        $requete->execute(array(
            ':CodeLiaison' => $CodeLiaison,
            ':DistanceEnMillesMarin' => $DistanceEnMillesMarin,
            ':IdPort'  => $IdPort,
            ':IdPort_1' => $IdPort_1,
            ':IdSecteur' => $IdSecteur
        ));
    } catch (Exception $e) {
        echo "ERREUR:" . $e->getMessage();
    } finally {
        $connexion = null;
    }
}

//Fonction qui va récupérer toutes les liaisons
function getLiaison()
{

    $resultat = array();

    try {
        $connexion = connexionPDO();
        $req = $connexion->prepare("select * from liaison ");
        $req->execute();
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

//Fonction qui va récupérer toutes les informations concernant la liaison à partir de son codeLiaison
function getDetailLiaisonById($CodeLiaison)
{

    $resultat = array();

    try {
        $connexion = connexionPDO();
        $query  = " SELECT * FROM liaison WHERE CodeLiaison = :CodeLiaison";
        $req = $connexion->prepare($query);
        $req->bindValue(':CodeLiaison', $CodeLiaison, PDO::PARAM_INT);
        $req->execute();
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

//Fonction qui va modifier la liaison 
function setModificationLiaison($distance, $IdPort1, $IdPort2, $IdSecteur, $CodeLiaison)
{
    try {
        $connexion = connexionPDO();

        $requete = $connexion->prepare("UPDATE liaison SET DistanceEnMillesMarin = :distance, IdPort = :idPort1, IdPort_1 = :idPort2, IdSecteur = :idSecteur WHERE CodeLiaison = :codeLiaison");
        $requete->execute(array(
            ':distance' => $distance,
            ':idPort1'  => $IdPort1,
            ':idPort2' => $IdPort2,
            ':idSecteur' => $IdSecteur,
            ':codeLiaison' => $CodeLiaison
        ));
    } catch (Exception $e) {
        echo "ERREUR:" . $e->getMessage();
        return false;
    } finally {
        $connexion = null;
    }
}

//Fonction qui va récupérer les informations concernant la table traverser à partir d'une date 
function getStatistique($dateTraversee)
{
    try {
        $connexion = connexionPDO();
        if ($dateTraversee != "") {
            $requete = $connexion->prepare("SELECT * FROM traversee WHERE dateTraversee >= ? ORDER BY dateTraversee ASC");
            $requete->bindValue(1, $dateTraversee);
            $requete->execute();
            $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultat = array(); // Retourner un tableau vide si la date n'est pas spécifiée
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

//Fonction qui va récupérer le nombre de passager total, par type à partir des table reservation, stocker et traversee
function getStatistiquesParDate($date)
{
    try {
        $connexion = connexionPDO();
        $requete = $connexion->prepare("
        SELECT SUM(s.Quantite) AS TotalPassagers, 
        SUM(CASE WHEN s.IdCategorie = 'A2' THEN s.Quantite ELSE 0 END) AS PassagersA2,
        SUM(CASE WHEN s.IdCategorie = 'A3' THEN s.Quantite ELSE 0 END) AS PassagersA3,
        SUM(CASE WHEN s.IdCategorie = 'A4' THEN s.Quantite ELSE 0 END) AS PassagersA4
        FROM reservation r
        INNER JOIN traversee t ON r.numeroTraversee = t.numeroTraversee
        INNER JOIN stocker s ON r.IdReservation = s.IdCategorie AND r.IdReservation = s.IdCategorie
        WHERE DATE(t.dateTraversee) = ?
        ");
        $requete->execute(array($date));
        $resultat = $requete->fetch(PDO::FETCH_ASSOC);
        return $resultat;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

//Fonction qui va récupérer toutes les informations concernant une date de traversee depuis la table traversee
function getListeDatesTraversees()
{
    try {
        $connexion = connexionPDO();

        $requete = $connexion->prepare("SELECT DISTINCT dateTraversee FROM traversee ORDER BY dateTraversee ASC");
        $requete->execute();
        $resultat = $requete->fetchAll(PDO::FETCH_COLUMN);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
