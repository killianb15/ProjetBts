<?php
/*
 * Description de fonctions.inc.php
 *
 * @author mattéo, nathan
 * Creation 05/2023
 * Derniere MAJ 16/05/2023
 * fonctions diverses
 */
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

// Fonction pour se déconnecter
function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["infosCompte"]);
}

// Fonction pour vérifier si un utilisateur est connecté
function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    
    $ret = false;

    if (isset($_SESSION["infosCompte"]["Id_Compte"]) && isset($_SESSION["infosCompte"]["Nom"])) {
        $ret = true;
    }
    
    return $ret;
}


function menu(){
    $menu = array();
    $menu[] = Array("url"=>"./?action=profil", "label"=>"Profil");
    $menu[] = Array("url"=>"./?action=billet", "label"=>"vos billet");
    $menu[] = Array("url"=>"./?action=film", "label"=>"Les Films");
    $menu[] = Array("url"=>"./?action=achatbillet", "label"=>"achat de billets");
    return $menu;
}

function creer_liste_deroulante(Array $lesclients){
    // definit la description html de la liste deroulante
    $listederoulante='<select name="listeclient" id="listeclient" onchange="alert(this.options[this.selectedIndex].text);//alert(this.selectedIndex);">';
    $i=0;  
    // parcours du tableau des villes
    while ($i<count($lesclients)){
        
        $unmel=$lesclients[$i]->getmelClient();
        // place l adresse mail dans la liste
        $listederoulante=$listederoulante.'<option value="'.$unmel.'">'.$unmel.'</option>';
        $i++;
    }
    $listederoulante .= '</select><br>'; // fin de remplissage de la liste
    return $listederoulante;
}

  function verif_mail($adr_mel) {
        
        // produit vrai si la chaine a la forme d'une adresse mail, faux sinon
        if ( preg_match ( " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " ,$adr_mel  ) ){
            $resultat=true;
         } else {
            $resultat=false;
         }
         return $resultat;
    }

    
