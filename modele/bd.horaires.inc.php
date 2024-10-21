<?php
include_once "bd.inc.php";

function getAllHoraires() {
    $horaires = array();

    try {
        // Connexion à la base de données
        $cnx = connexionPDO();
        // Requête SQL pour récupérer tous les horaires avec leurs informations associées
        $sql = "SELECT horaires.Id_horaires, horaires.DateProj, horaires.heure_debut, horaires.heure_fin, salle.numero AS NumeroSalle, film.Nom AS NomFilm
                FROM horaires
                JOIN salle ON horaires.Id_Salle = salle.Id_Salle
                JOIN film ON horaires.Id_Film = film.Id_Film";
        // Préparation de la requête
        $req = $cnx->prepare($sql);
        // Exécution de la requête
        $req->execute();
        // Récupération des résultats
        $horaires = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Gestion des erreurs
        echo "Erreur : " . $e->getMessage();
    }

    // Retourne tous les horaires avec leurs informations associées
    return $horaires;
}
// Autres fonctions pour les opérations CRUD sur la table horaires
?>
