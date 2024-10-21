<?php
// Inclusion des fichiers nécessaires
include_once "$racine/fonctions/fonctions.lib.php";
include_once "$racine/modele/bd.horaires.inc.php";
include_once "$racine/modele/bd.type_billet.inc.php";
include_once "$racine/modele/bd.billet.inc.php";
include_once "$racine/modele/bd.salle.inc.php"; // Ajout de l'inclusion du modèle pour la salle

// Initialisation des variables
$msgErreur = "";
$connecte=false;

// Vérification des informations de connexion si le formulaire a été soumis
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['horaire'])) {
    $age = $_SESSION['infosCompte']['Age'];
    $id = $_SESSION['infosCompte']['Id_Compte'];
    $typebillet  = getTypeBilletByAge($age);
    $typebillet = $typebillet['id_type_billet'];
    $idhoraires = $_POST['horaire'];
    $nbBillets = countBilletsForHoraire($idhoraires);
    var_dump($nbBillets);
    // Récupération de la capacité de la salle pour cet horaire
    $capaciteSalle = getSalleCapacityForHoraire($idhoraires);
    var_dump($capaciteSalle);

    if ($nbBillets < $capaciteSalle) {
        // Ajout du billet uniquement si le nombre de billets pour cet horaire est inférieur à la capacité de la salle
        ajouterBillet($id, $typebillet, $idhoraires);
        $msgErreur = "L'ajout s'est bien fait. Vous pouvez aller consulter vos billets.";
    } else {
        $msgErreur = "Impossible d'ajouter un billet pour cet horaire. La salle est déjà pleine.";
    }
}

$titre = "Achat de billet";
$horaires = getAllHoraires();

// Inclusion de l'entête et de la vue de connexion
include $racine."/vue/entete.html.php";
include $racine."/vue/vueAchatbillet.php";
?>
