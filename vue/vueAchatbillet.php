<?php

/* 
 * Description de VueAchatbillet.php
 *
 * @author nathan, matthew, quentin, matteo
 * Creation 05/2023
 * Derniere MAJ 09/09/2023
 */
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
?>
<h1>Achat de billets</h1>

<div class="bloc">
    <form action="?action=achatbillet" method="POST">
        <label for="id_de_votre_input">Cela va s'ajouter automatiquement à votre compte avec vos imformation de compte</label>
        <br><br><br>
        <label for="horaire">Horaire :</label>
        <select name="horaire" id="horaire">
            <?php foreach ($horaires as $horaire) : ?>
                <option value="<?php echo $horaire['Id_horaires']; ?>">
                    <?php echo $horaire['NomFilm'] . ' - ' . $horaire['DateProj'] . ' ' . $horaire['heure_debut']; ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <div class="boutton">
            <input type="submit" value="Acheter" name="achat"/>
        </div>
        
        <br><span class="alerte">
            <?php if (isset($msgErreur)) {
                echo $msgErreur;
            }?>
        </span>
    </form>
</div>
