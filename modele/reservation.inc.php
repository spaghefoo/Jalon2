<?php
include_once "bd.inc.php";
// pour setReservation...(verifier l'utilisateur etc.)
include_once "authen.inc.php";
include_once "utilisateur.inc.php";
/**
 * modele de création de reservation.
 * 
 * @author Galdric Tingaud
 * @author Sofiane Acheraiou
 * @author Théophane Legrand
 * 
 */


 /**
     * Récupere une reservation de la table réservation en fonction de son numero.
     * @param idReservation Int, Numero de la reservation.
     * 
     * @return resultat Array, les données de la reservation.
     * 
     */
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
 /**
     * Recupere tous les reservations d'un utilisateur en particulier.
     * @param String $mailU, le mail de l'utilisateur
     * 
     * @return Array $resultat, Reservations de l'utilisateur
     */
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


 /**
     * Recupere une reservation par son numero.
     * 
     * @param Int $idReservation , numero de la reservation
     * 
     * @return Array $resultat, Reservation.
     */
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


 /**
     * Ajoute une reservation dans la table reservation de la base de données
     * @param date $date YYYY-mm-dd, Date de la reservation.
     * @param int $traversee, numero de la traversée.
     * 
     * @return int Numero de la reservation créée.
     */
function setReservation($date ,$traversee)
{
   
    try
    {
       // print_r($idR);
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


       
    
    }
    catch(Exception $e)
    {
        echo "ERREUR:".$e->getMessage();
    }
    finally
    {
        $co = null;
    }

    return $idR['IdReservation'];
}

 /**
     * 
     * Assigne une reservation a une catégorie commandée dans la table stocker.
     * 
     * @param Int $idReservation, Numero de la reservation
     * @param Int $idCategorie, Type de la catégorie reservée
     * @param Int $idType, Sous-catégorie(Enfant, adulte...)
     * @param Int $qte, la quantité de la catégorie prise.
     * 
     * @return void
     */
function setStocker($idReservation, $idcategorie, $idType, $qte)
{
   
    try
    {
        switch($idcategorie)
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
        $full_type = $cate_lettre.$idType;
        $co = connexionPDO();

        $sql = "INSERT INTO stocker VALUES(:idCategorie, :idType, :idReserv, :qte)";
        $prepare = $co->prepare($sql);
        $prepare->execute(
            array(
                ':idCategorie' => $idcategorie,
                ':idType' => $full_type,
                ':idReserv' => $idReservation,
                ':qte' => $qte
            )
            );
    }
    catch(PDOException $e)
    {
        echo "ERREUR:".$e->getMessage();
    }
    finally
    {
        $co = null;
    }
}
/**
 * Permet de recuperer le prix d'une reservation en fonction de la quantité.
 * 
 * @param qte Int, La quantité commandée d'une reservation
 * @param codeLiaison Int, Le numero de la liaison commandée
 * @param categorie Int, La catégorie commandée
 * @param souscategorie Int, La sous-catégorie 
 * @param periode Int, la periode dans laquelle la commandé a été passée
 * @return float/double Le prix total.
 * 
 * @todo Gestion des periodes qui changent(et ajout de ses periodes(panel admin))
 * 
 */
function getPrix($qte, $codeLiaison, $categorie, $souscategorie, $periode)
{

    try
    {
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
        $categorie_final = $cate_lettre.$souscategorie;
        $co = connexionPDO();
        $sql = "SELECT * FROM tarifer WHERE CodeLiaison = :liaison AND IdType = :categorie AND IdPeriode = :periode";
        $prepare = $co->prepare($sql);
        $prepare->bindValue(':liaison', $codeLiaison);
        $prepare->bindValue(':categorie', $categorie_final);
        $prepare->bindValue(':periode', $periode);
        $prepare->execute();
        $prix = $prepare->fetch(PDO::FETCH_ASSOC);
        //print_r($prix);
    }
    catch(PDOException $e)
    {
        echo "ERREUR:".$e->getMessage();
    }
    finally
    {
        $co = null; 
    }
    return $prix['Tarif'] * $qte;
}

?>