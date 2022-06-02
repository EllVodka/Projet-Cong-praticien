<?php header('content-type: text/html; charset=utf-8'); 
?>

<h1>Profil de <?php echo $resultat->getnom() . ' ' . $resultat->getPrenom(); ?></h1>



<?php



?>
    <div class="bord">
        <h2 class="sansBg">Information détaillé</h2>
        <h3 class="sansBg h3">Identifiant</h3>
        <p class="noir"><?php echo ($resultat->getId()); ?></p>
        <h3 class="sansBg h3">Adresse</h3>
        <p class="noir"><?php echo ($resultat->Getadresse()); ?></p>
        <h3 class="sansBg h3">Coefficient de notoriété</h3>
        <p class="noir"><?php echo ($resultat->getNotoriete()); ?></p>
        <h3 class="sansBg h3">Code du praticien</h3>
        <p class="noir"><?php echo ($resultat->getTypePraticien()); ?></p>
        <h3 class="sansBg h3">Id de la ville </h3>
        <p class="noir"><?php echo ($resultat->getVille()); ?></p>
    </div>
<?php


?>