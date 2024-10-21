<?php
// Fonction pour récupérer les types de billet avec les âges minimum et maximum
function getTypesBillet() {
    $typesBillet = array();

    try {
        // Connexion à la base de données
        $cnx = connexionPDO();
        // Requête SQL pour récupérer les types de billet avec les âges minimum et maximum
        $sql = "SELECT id_type_billet, Nom, AgeMin, AgeMax FROM type_billet";
        // Préparation de la requête
        $req = $cnx->prepare($sql);
        // Exécution de la requête
        $req->execute();
        // Récupération des résultats
        $typesBillet = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Gestion des erreurs
        echo "Erreur : " . $e->getMessage();
    }

    // Retourne les types de billet avec les âges minimum et maximum
    return $typesBillet;
}
// Inclure le fichier de connexion à la base de données si nécessaire
function getTypeBilletByAge($age_utilisateur) {
    try {
        // Connexion à la base de données
        $cnx = connexionPDO();

        // Requête SQL pour récupérer le type de billet en fonction de l'âge de l'utilisateur
        $sql = "SELECT id_type_billet
                FROM type_billet
                WHERE :age_utilisateur BETWEEN AgeMin AND AgeMax";

        // Préparation de la requête
        $req = $cnx->prepare($sql);

        // Liaison des paramètres
        $req->bindParam(':age_utilisateur', $age_utilisateur, PDO::PARAM_INT);

        // Exécution de la requête
        $req->execute();

        // Récupération des résultats
        $typeBillet = $req->fetch(PDO::FETCH_ASSOC);

        // Retourne le type de billet trouvé
        return $typeBillet;
    } catch (PDOException $e) {
        // Gestion des erreurs
        echo "Erreur : " . $e->getMessage();
        return null;
    }
}
?>
