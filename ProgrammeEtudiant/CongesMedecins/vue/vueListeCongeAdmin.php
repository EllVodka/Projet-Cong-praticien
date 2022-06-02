<?php header( 'content-type: text/html; charset=utf-8' ); 
?>

<h1>Liste des congés </h1>


<?php
setlocale(LC_TIME, "fr_FR", "French");
for ($i = 0; $i < count($listeConges); $i++) {
    ?>

    <div class="card">
    <div class="descrCard">
    <?php echo $listeConges[$i]->getPraticien()->getNom().' '.$listeConges[$i]->getPraticien()->getPrenom(); ?><br/>
    <?php echo "<a href='./?action=detailConge&idC=" . $listeConges[$i]->getId() ."&admin=oui"."'>" . date_format(new datetime($listeConges[$i]->getDebut()),'d/m/Y') . "</a>"; ?>
            <br />
            <?= date_format(new datetime($listeConges[$i]->getFin()),'d/m/Y').'</br>'; ?>
            <?php if($listeConges[$i]->getValidation() == 1)
            {
                echo 'Validé';
            }
            else
            {?>
                Non validé 
                
            <?php
            
            } ?>
            </br>
            <a href='./?action=supprimerConge&idC=<?= $listeConges[$i]->getId()."&admin=oui"; ?>'>Supprimer</a>
            <br />
        </div>
    </div>
    <?php
}
?>