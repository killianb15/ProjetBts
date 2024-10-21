<?php
/*
 * Description de index.php
 *
 * @author joel
 * Creation 01/2021
 * Derniere MAJ 01/01/2022
 * Fichier de démarrage de l'application web
 */

include_once "getRacine.php";
include_once "$racine/controleur/controleurPrincipal.php";




if (isset($_GET["action"])){
    $action = $_GET["action"];
}
else{
    
    $action = "defaut";
}

$fichier = controleurPrincipal($action);
include_once "$racine/controleur/$fichier";

?>
