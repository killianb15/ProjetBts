<?php
include_once "bd.inc.php";

function getAllSalles() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $sql = "SELECT * FROM Salle";
        $req = $cnx->prepare($sql);
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
// Fonction pour récupérer la capacité de la salle pour un horaire donné
function getSalleCapacityForHoraire($idHoraire) {
    try {
        // Connexion à la base de données
        $cnx = connexionPDO();

        // Requête SQL pour récupérer la capacité de la salle
        $sql = "SELECT salle.capacite
                FROM horaires
                JOIN salle ON horaires.Id_Salle = salle.Id_Salle
                WHERE horaires.Id_horaires = :idHoraire";

        // Préparation de la requête
        $req = $cnx->prepare($sql);

        // Liaison des paramètres
        $req->bindParam(':idHoraire', $idHoraire, PDO::PARAM_INT);

        // Exécution de la requête
        $req->execute();

        // Récupération de la capacité de la salle
        $capacite = $req->fetchColumn();

        // Retourne la capacité de la salle
        return $capacite;
    } catch (PDOException $e) {
        // Gestion des erreurs
        echo "Erreur : " . $e->getMessage();
        return null;
    }
}

// Autres fonctions pour les opérations CRUD sur la table Salle
?>
