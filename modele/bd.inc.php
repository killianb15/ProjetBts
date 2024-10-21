<?php
/*
 * Description de bd.inc.php
 * fonction de connexion à la base de données
 * @author mattéo, nathan, quentin
 * Creation 05/2023
 * Derniere MAJ 16/05/2023
*/


function connexionPDO() {
    $login = "bouhourd";
    $mdp = "bouhourd";
    $bd = "cinema";
    $serveur = "localhost"; // localhost ou adresse IP du serveur de BDD

    try {
        $conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        print "Erreur de connexion PDO ";
        die();
    }
}





?>