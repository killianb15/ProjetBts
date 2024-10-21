<?php
include_once "bd.inc.php";

function getAllFilms() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $sql = "SELECT * FROM Film";
        $req = $cnx->prepare($sql);
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
function getFilmsInfo() {
    $filmsInfo = array();

    try {
        // Connexion à la base de données
        $cnx = connexionPDO();
        // Requête SQL pour récupérer les informations des films, des réalisateurs et des intervenants
        $sql = "SELECT film.Id_Film, film.Nom AS NomFilm, film.Synopsis, film.Affiche, film.Budget, 
                       film.Realisateur, film.Casting
                FROM film";
        // Préparation de la requête
        $req = $cnx->prepare($sql);
        // Exécution de la requête
        $req->execute();
        // Récupération des résultats
        $filmsInfo = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Gestion des erreurs
        echo "Erreur : " . $e->getMessage();
    }

    // Retourne les informations des films
    return $filmsInfo;
}


// Autres fonctions pour les opérations CRUD sur la table Film
?>
