<?php
/**
 * Module base de donnée Marieteam
 * @author Galdric Tingaud
 * @author Théophane Legrand
 * @author Sofiane Acheraiou
 */

function connexionPDO() {
/**
 * Permet de se connecter a la base de données
 * 
 * @var String $login
 * @var String $mdp
 * @var String $bd
 * @var String $serveur
 * 
 * @return void
 */
    $login = "root";
    $mdp = "";
    $bd = "marieteam";
    $serveur = "localhost";

    try {
        $conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        print "Erreur de connexion PDO ";
        die();
    }
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog de test
    header('Content-Type:text/plain');

    echo "connexionPDO() : \n";
    print_r(connexionPDO());
}
?>
