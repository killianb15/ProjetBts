<?php
/*
 * Description de c_Profil.php
 *
 * @author nathan, matthew, quentin, matteo
 * Creation 05/2023
 * Derniere MAJ 09/09/2023
 * partie controleur de l'authentification
 */
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/fonctions/fonctions.lib.php";
include_once "$racine/modele/bd.billet.inc.php";

if (!isset($_SESSION)) {
    session_start();
}
// Accès aux informations du compte stockées dans la session
$infosCompte = $_SESSION['infosCompte'];
$billets = getBilletsByCompteId($infosCompte["Id_Compte"]);
$titre = "consultation des billets";
include_once "$racine/vue/entete.html.php";
include_once "$racine/vue/vueMesbillet.php";
?>

