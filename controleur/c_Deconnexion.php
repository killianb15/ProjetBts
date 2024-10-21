<?php

/*
 * @author quentin, nathan, mattéo
 * Creation 05/2023
 * Derniere MAJ 23/05/2023
*/

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Ce fichier gère la connexion des visiteurs.
 */

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/fonctions/fonctions.lib.php";

logout();
/*include_once "$racine/fonctions/fonctions.lib.php";
include_once "$racine/modele/bd.visiteur.inc.php";*/



include $racine."/controleur/c_Connexion.php";