<?php
/*
 * Description de VueProfil.php
 *
 * @author nathan, matthew, quentin, matteo
 * Creation 05/2023
 * Derniere MAJ 09/09/2023
 */
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
?>
<span>
    <?php
        if(isset($msgConfirmation)){
            echo $msgConfirmation;
        }
    ?>
</span>
<h1>Mon profil</h1>
<div class="bloc">
    <div>
        <label>Identifiant :</label><?php echo "<affichage>" . $infosCompte["Id_Compte"] . "</affichage>"; ?><br><br>
        <label>Nom :</label><?php echo "<affichage>" . $infosCompte["Nom"] . "</affichage>"; ?><br><br>
        <label>Age :</label><?php echo "<affichage>" . $infosCompte["Age"] . "</affichage>"; ?><br><br>
        
    </div>
</div>