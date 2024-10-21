<?php
// Inclusion des fichiers nécessaires
include_once "$racine/fonctions/fonctions.lib.php";
include_once "$racine/modele/bd.compte.inc.php";

// Initialisation des variables
$msgErreur = "";
$connecte=false;
// Vérification des informations de connexion si le formulaire a été soumis
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['Connexion'])) {
    // Récupération des données du formulaire
    $nomUtilisateur = $_POST['Utilisateur'];
    $motDePasse = $_POST['mdp'];

    // Vérification du mot de passe dans la base de données
    $mdpBaseDeDonnees = getMotDePasseByNomUtilisateur($nomUtilisateur);
    // Vérification du mot de passe
    if ($mdpBaseDeDonnees  !== null && $motDePasse === $mdpBaseDeDonnees) {
            // if (password_verify($motDePasse, $mdpBaseDeDonnees)) {

        // Le mot de passe est correct, l'utilisateur est connecté
        $connecte = true;
        $infosCompte = getInfoCompteByNomUtilisateur($nomUtilisateur);
    // Stockage des informations du compte dans la session
        $_SESSION['infosCompte'] = $infosCompte;
    } else {
        // Affichage d'un message d'erreur si les identifiants sont incorrects
        $msgErreur = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
$titre = "connexion";

if($connecte===true ){
    // Inclusion de l'entête et de la vue de connexion
    include $racine."/vue/entete.html.php";
    include $racine."/controleur/c_Profil.php";
}else{
    // Inclusion de l'entête et de la vue de connexion
    include $racine."/vue/entete.html.php";
    include $racine."/vue/vueConnexion.php";
}

