<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
?>
<h1>Connexion</h1>
<div class="bloc">
    <form action="?action=connexion" method="POST">
        <label>Utilisateur :</label><input type="text" name="Utilisateur" size="25"/><br ><br >
        <label>Mot de passe :</label><input type="password" name="mdp" size="25"/><br ><br >
        <br /><div class="boutton"><input type="submit" value="Connexion" name="Connexion"/></div>
        <br><span class="alerte">
            <?php if (isset($msgErreur)){
                    echo $msgErreur;
            }?>
        </span>
    </form>
</div>
