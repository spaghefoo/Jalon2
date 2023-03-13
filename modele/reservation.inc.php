<?php
include_once "bd.inc.php";
// pour setReservation...(verifier l'utilisateur etc.)
include_once "authen.inc.php";
include_once "utilisateur.inc.php";

function getReservation($idReservation){
    $resultat = array();

    try {
        $co = connexionPDO();
        $req = $co->prepare("select * from reservation where idReservation=:idReservation");
        $req->bindValue(':idReservation', $idReservation, PDO::PARAM_INT);
        $req->execute();
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }

    } catch (PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    } return $resultat;
}

function getReservationsIdUtilisateur($mailU){
    $resultat = array();

    try {
        $co = connexionPDO();
        // $req = $co->prepare("select reservation.* from reservation,reserver where reservation.idReservation = reserver.idReservation and mailU = :mailU");
        /*$query  =   " SELECT reservation.IdReservation, reservation.DateReservation, reservation.numeroTraversee".
                    " from reservation, client".
                    " where client.IdClient = reservation.IdClient and ".
                    " client.AdresseMail = :mailU";
        */

        $query  =   " SELECT reservation.IdReservation,reservation.DateReservation,reservation.numeroTraversee,traversee.dateTraversee,".
                    " p1.libellePort as portDepart,p2.libellePort as portArrivee".
                    " from reservation, client,traversee,liaison, port p1, port p2".
                    " where client.IdClient = reservation.IdClient and".
                    " reservation.numeroTraversee = traversee.numeroTraversee and".
                    " traversee.CodeLiaison = liaison.CodeLiaison and".
                    " liaison.IdPort = p1.IdPort AND".
                    " liaison.IdPort_1 = p2.IdPort and".
                    " client.AdresseMail = :mailU";
        $req = $co->prepare($query);
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->execute();
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    } return $resultat;
}



function getDetailReservationById($idReservation){
    $resultat = array();

    try {
        $co = connexionPDO();
        $query  =
            " SELECT reservation.IdReservation,reservation.DateReservation,stocker.Quantite,type.IdCategorie,".
            " type.IdType,type.TypeTarif,categorie.libelleCategorie".
            " FROM reservation,stocker,type,categorie".
            " WHERE reservation.IdReservation = stocker.IdReservation AND".
            " stocker.IdType = type.IdType AND".
            " stocker.IdCategorie = type.IdCategorie and".
            " type.IdCategorie = categorie.IdCategorie and".
            " reservation.IdReservation = :IdReservation";

        $req = $co->prepare($query);
        $req->bindValue(':IdReservation', $idReservation, PDO::PARAM_INT);
        $req->execute();
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    } return $resultat;
}

function setReservation($date ,$traversee, $qte, $categorie, $subcategorie)
{
    try
    {
       // print_r($idR);
        switch($categorie)
        {
            case 1:
                $cate_lettre = 'A';
                break;
            case 2:
                $cate_lettre = 'B';
                break;
            case 3:
                $cate_lettre = 'C';
                break;
        }
        $full_type = $cate_lettre.$subcategorie;

        $currentUser = getMailULoggedOn(); // on recupere l'email de l'utilisateur connecté
        $idClient = getUtilisateurByMailU($currentUser)['IdClient']; //on recup l'id client de l'utilisateur connecté
        $co = connexionPDO();
        // on recupere l'utilisateur actuellement connecté.

        $sql = "INSERT INTO reservation VALUES(0,:date, :idclient, :numerotraversee)";

        $prepare = $co->prepare($sql);
        $prepare->bindValue(':date', $date);
        $prepare->bindValue(':idclient', $idClient, PDO::PARAM_INT);
        $prepare->bindValue(':numerotraversee', $traversee, PDO::PARAM_INT);
        $prepare->execute();

        $sql_select = "SELECT IdReservation FROM reservation WHERE dateReservation = :date AND IdClient = :idclient AND numeroTraversee = :numerotraversee";
        
        $prepare_select = $co->prepare($sql_select);
        $prepare_select->bindValue(':date', $date);
        $prepare_select->bindValue(':idclient', $idClient, PDO::PARAM_INT);
        $prepare_select->bindValue(':numerotraversee', $traversee, PDO::PARAM_INT);
        $prepare_select->execute();
        $idR = $prepare_select->fetch(PDO::FETCH_ASSOC);

      

        //TODO: CHECK TO SEE THE NUMBER OF PLACES LEFT.
        

        $sql_stocker = "INSERT INTO stocker VALUES(:idCategorie, :idType, :idreserv, :qte)";
        $prepare = $co->prepare($sql_stocker);
        $prepare->bindValue(':idCategorie', $categorie, PDO::PARAM_INT);
        $prepare->bindValue(':idType', $full_type);
        $prepare->bindValue(':idreserv', $idR['IdReservation'], PDO::PARAM_INT);
        $prepare->bindValue(':qte', $qte, PDO::PARAM_INT);
        $prepare->execute();

    
    
    }
    catch(Exception $e)
    {
        echo "ERREUR:".$e->getMessage();
    }
    finally
    {
        $co = null;
    }
}

function getPrix($qte, $codeLiaison, $souscategorie)
{
    try
    {
        $categorie_final = 'A'.$souscategorie;
        $co = connexionPDO();
        $sql = "SELECT * FROM tarifer WHERE codeLiaison = :liaison AND idType = :categorie";
        $prepare = $co->prepare($sql);
        $prepare->bindValue(':liaison', $codeLiaison);
        $prepare->bindValue(':categorie', $souscategorie);
        $prepare->execute();
        $prix = $prepare->fetch();
    }
    catch(PDOException $e)
    {
        echo "ERREUR:".$e->getMessage();
    }
    finally
    {
        $co = null; 
    }
    return $prix * $qte;
}

?>