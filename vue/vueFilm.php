<?php
/*
 * Description de VueFilm.php
 *
 * @author nathan, matthew, quentin, matteo
 * Creation 05/2023
 * Derniere MAJ 09/09/2023
 */
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
// Debug pour vérifier les données $films
?>
<span>
    <?php
    if (isset($msgConfirmation)) {
        echo $msgConfirmation;
    }
    ?>
</span>
<h1>Liste des films</h1>

<div class="bloc">
    <table>
        <tr>
            <th>Nom</th>
            <th>Synopsis</th>
            <th>Affiche</th>
            <th>Budget</th>
            <th>Réalisateur</th>
            <th>Acteurs</th>
        </tr>
        <?php foreach ($films as $film) : ?>
            <tr>
                <td><?php echo $film['NomFilm']; ?></td>
                <td><?php echo $film['Synopsis']; ?></td>
                <?php
                // Construction du chemin complet de l'affiche
                $cheminAffiche ='images/' . $film['Affiche'];
                ?>

                <td><img src="<?php echo $cheminAffiche; ?>" width="100"></td>
                
                <td><?php echo $film['Budget'].'$'; ?></td>
                <td><?php echo $film['Realisateur'] ; ?></td>
                <td><?php echo $film['Casting'];  ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>


