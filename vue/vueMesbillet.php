<?php
/*
 * Description de VueProfil.php
 *
 * @author nathan, matthew, quentin, matteo
 * Creation 05/2023
 * Derniere MAJ 09/09/2023
 */
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
?>
<span>
    <?php
    if (isset($msgConfirmation)) {
        echo $msgConfirmation;
    }
    ?>
</span>
<h1>Mes billets</h1>
<div class="bloc">
    <table>
        <tr>
            <th>Identifiant du billet</th>
            <th>film</th>
            <th>Date</th>
            <th>heure de début</th> 
            <th>prix</th>
            <th>Salle</th>
            <!-- Nouvelle colonne pour les informations -->
        </tr>
        <?php foreach ($billets as $billet) : ?>
            <?php 
                $infoBillet = getInfoBillet($billet['Id_billet']);
            ?>
            <tr>
                <td><?php echo $billet['Id_billet']; ?></td>
                <td><?php echo $infoBillet['NomFilm']; ?></td>
                <td><?php echo $infoBillet['DateProj']; ?></td>
                <td><?php echo $infoBillet['heure_debut']; ?></td>
                <td><?php echo $infoBillet['Prix']; ?></td>
                <td><?php echo $infoBillet['NumeroSalle']; ?></td>

            </tr>
        <?php endforeach; ?>
    </table>
</div>
