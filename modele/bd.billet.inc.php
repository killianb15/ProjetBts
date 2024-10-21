<?php
include_once "bd.inc.php";

function getAllBillets() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $sql = "SELECT * FROM billet";
        $req = $cnx->prepare($sql);
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

// Autres fonctions pour les opérations CRUD sur la table billet
function getBilletsByCompteId($idCompte) {
    $billets = array();
    try {
        // Connexion à la base de données
        $cnx = connexionPDO();
        // Requête SQL pour récupérer les billets associés à l'utilisateur
        $sql = "SELECT * FROM billet WHERE Id_Compte = :idCompte";
        // Préparation de la requête
        $req = $cnx->prepare($sql);
        // Liaison des paramètres
        $req->bindParam(':idCompte', $idCompte, PDO::PARAM_INT);
        // Exécution de la requête
        $req->execute();
        // Récupération des résultats
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            // Ajout du billet à la liste sous forme de tableau associatif
            $billets[] = array(
                'Id_billet' => $row['Id_billet'],
                'Id_Compte' => $row['Id_Compte'],
                'Id_horaires' => $row['Id_horaires'],
                'id_type_billet' => $row['id_type_billet']
            );
        }
    } catch (PDOException $e) {
        // Gestion des erreurs
        echo "Erreur : " . $e->getMessage();
    }

    // Retourne la liste des billets associés à l'utilisateur
    return $billets;
}
// Fonction pour récupérer le prix, l'heure de début avec le jour, et le numéro de salle pour un billet donnéNomFilm
function getInfoBillet($idBillet) {
    $infoBillet = array();

    try {
        // Connexion à la base de données
        $cnx = connexionPDO();
        // Requête SQL pour récupérer les informations nécessaires
        $sql = "SELECT type_billet.Prix, horaires.DateProj, horaires.heure_debut, salle.numero AS NumeroSalle, film.Nom AS NomFilm
                FROM billet
                JOIN horaires ON billet.Id_horaires = horaires.Id_horaires
                JOIN salle ON horaires.Id_Salle = salle.Id_Salle
                JOIN type_billet ON billet.id_type_billet = type_billet.id_type_billet
                JOIN film ON horaires.Id_Film = film.Id_Film
                WHERE billet.Id_billet = :idBillet";
        // Préparation de la requête
        $req = $cnx->prepare($sql);
        // Liaison des paramètres
        $req->bindParam(':idBillet', $idBillet, PDO::PARAM_INT);
        // Exécution de la requête
        $req->execute();
        // Récupération des résultats
        $infoBillet = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Gestion des erreurs
        echo "Erreur : " . $e->getMessage();
    }

    // Retourne les informations du billet
    return $infoBillet;
}
// Inclure le fichier de connexion à la base de données si nécessaire

function ajouterBillet($id_compte, $id_type_billet, $id_horaires) {
    try {
        // Connexion à la base de données
        $cnx = connexionPDO();

        // Requête SQL pour ajouter un nouveau billet
        $sql = "INSERT INTO billet (Id_Compte, Id_horaires, id_type_billet)
                VALUES (:id_compte, :id_horaires, :id_type_billet)";

        // Préparation de la requête
        $req = $cnx->prepare($sql);

        // Liaison des paramètres
        $req->bindParam(':id_compte', $id_compte, PDO::PARAM_INT);
        $req->bindParam(':id_type_billet', $id_type_billet, PDO::PARAM_INT);
        $req->bindParam(':id_horaires', $id_horaires, PDO::PARAM_INT);

        // Exécution de la requête
        $req->execute();

        // Retourne l'ID du billet nouvellement inséré
        return $cnx->lastInsertId();
    } catch (PDOException $e) {
        // Gestion des erreurs
        echo "Erreur : " . $e->getMessage();
        return null;
    }
}
function countBilletsForHoraire($id_horaires) {
    try {
        // Connexion à la base de données
        $cnx = connexionPDO();

        // Requête SQL pour compter le nombre de billets pour un ID d'horaire donné
        $sql = "SELECT COUNT(*) AS nbBillets FROM billet WHERE Id_horaires = :id_horaires";

        // Préparation de la requête
        $req = $cnx->prepare($sql);

        // Liaison des paramètres
        $req->bindParam(':id_horaires', $id_horaires, PDO::PARAM_INT);

        // Exécution de la requête
        $req->execute();

        // Récupération du nombre de billets
        $result = $req->fetch(PDO::FETCH_ASSOC);

        // Retourne le nombre de billets
        return $result['nbBillets'];
    } catch (PDOException $e) {
        // Gestion des erreurs
        echo "Erreur : " . $e->getMessage();
        return null;
    }
}

?>


