<?php
include_once "bd.inc.php";

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
?>