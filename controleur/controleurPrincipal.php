<?php
/*
 * Description de controleurPrincipal.php
 *
 * @author nathan, quentin, matteo
 * Creation 05/2023
 * Derniere MAJ 09/05/2023
 * organise les pages à executer (via leur controleur)
 */


function controleurPrincipal(string $action){
    $lesActions = array();
    $lesActions["defaut"] = "c_Connexion.php";
    $lesActions["profil"] = "c_Profil.php";
    $lesActions["connexion"] = "c_Connexion.php";
    $lesActions["deconnexion"] = "c_Deconnexion.php";
    $lesActions["billet"] = "c_Mesbillet.php";
    $lesActions["film"] = "c_Film.php";
    $lesActions["achatbillet"] = "c_Achatbillet.php";

   
    if (array_key_exists ( $action , $lesActions )){
        $resultat= $lesActions[$action];
    }
    else{
        $resultat= $lesActions["defaut"];
    }
    return $resultat;
}
?>