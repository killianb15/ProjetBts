<?php
include_once "bd.inc.php";

function getAllComptes() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $sql = "SELECT * FROM Compte";
        $req = $cnx->prepare($sql);
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

// Autres fonctions pour les opérations CRUD sur la table Compte
function getMotDePasseByNomUtilisateur($nomUtilisateur) {
    $motDePasse = null;
    try {
        // Connexion à la base de données
        $cnx = connexionPDO();
        // Requête SQL pour récupérer le mot de passe associé au nom d'utilisateur
        $sql = "SELECT MotDePasse FROM Compte WHERE Nom = :nomUtilisateur";
        // Préparation de la requête
        $req = $cnx->prepare($sql);
        // Liaison des paramètres
        $req->bindParam(':nomUtilisateur', $nomUtilisateur, PDO::PARAM_STR);
        // Exécution de la requête
        $req->execute();
        // Récupération du mot de passe
        $motDePasse = $req->fetchColumn();
    } catch (PDOException $e) {
        // Gestion des erreurs
        echo "Erreur : " . $e->getMessage();
    }

    // Retourne le mot de passe associé au nom d'utilisateur
    return $motDePasse;
}

function getInfoCompteByNomUtilisateur($nomUtilisateur) {
    try {
        // Connexion à la base de données
        $cnx = connexionPDO();
        
        // Préparation de la requête SQL
        $sql = "SELECT Id_Compte, Nom, Age FROM Compte WHERE Nom = :nomUtilisateur";
        $stmt = $cnx->prepare($sql);
        
        // Liaison du paramètre :nomUtilisateur
        $stmt->bindParam(':nomUtilisateur', $nomUtilisateur, PDO::PARAM_STR);
        
        // Exécution de la requête
        $stmt->execute();
        
        // Récupération des résultats
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Retourner les informations du compte
        return $resultat;
    } catch (PDOException $e) {
        // Gestion des erreurs de connexion à la base de données
        echo "Erreur: " . $e->getMessage();
        return null; // En cas d'erreur, retourner null
    }
}
?>
