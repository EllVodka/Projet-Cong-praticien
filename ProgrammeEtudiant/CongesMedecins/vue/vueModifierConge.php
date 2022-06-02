<?php header( 'content-type: text/html; charset=utf-8' ); 
$idA = $_GET['idA'];
$idC = $_GET['idC'];

$maDate = date_create(date('Y-m-d')); 
date_add($maDate, date_interval_create_from_date_string("1 year"));

$dateDebut = date_create($unConge[$idA]->getDebut());
$dateFin = date_create($unConge[$idA]->getFin());




setlocale(LC_TIME, "fr_FR", "French");


?>

<h1>Modification du congé</h1>

<form action="./?action=modificationConge&idC=<?= $idC ?>" method="POST">
 
    <h1 > <label class="noir"  for="debut">Début du congé</label>
        <input type="date" id="debut" name="date_debut" value = "<?= $dateDebut->format('Y-m-d'); ?>" min="<?= date('Y-m-d'); ?>" max="<?= $maDate->format('Y-m-d'); ?>"> <br />
        <label class="noir" for="debut">Fin du congé</label>
        <input type="date" id="fin" name="date_fin" value = "<?= $dateFin->format('Y-m-d'); ?>" min="<?= date('Y-m-d'); ?>" max="<?= $maDate->format('Y-m-d'); ?>"> <br />
        <?php 
        if($unConge[$idA]->getValidation() == 1)
        {
            echo 'Validé';
        }
        else
        {?>
            Non validé </br>
        <?php
        } ?>
    </h1>
    <input type="submit" value="Enregistrer">
</form>