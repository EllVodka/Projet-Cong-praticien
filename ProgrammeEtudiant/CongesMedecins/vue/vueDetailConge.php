<?php
?>
<h1>Details Congé :</h1>

<?php
if ($plusieursConge) {
	for ($i = 0; $i < count($unConge); $i++) {
?>
		<hr>
		<h2 class="noir sansBg">Debut du congé : <?= date_format(new datetime($unConge[$i]->getDebut()), 'd/m/Y'); ?> </h2>
		<h2 class="noir sansBg">Fin du congé : <?= date_format(new datetime($unConge[$i]->getFin()), 'd/m/Y'); ?> </h2>
		<h2 class="noir sansBg">Validation des congé : <?php if ($unConge[$i]->getValidation() == 1) {
													echo "Validé";
												} else {
													echo "Non validé";
												}
											}								
												?></h2>
<?php 
}else{
	?>
	<h2 class="noir sansBg">Debut du congé : <?= date_format(new datetime($unConge->getDebut()), 'd/m/Y'); ?> </h2>
	<h2 class="noir sansBg">Fin du congé : <?= date_format(new datetime($unConge->getFin()), 'd/m/Y'); ?> </h2>
	<h2 class="noir sansBg">Validation des congé : <?php if ($unConge->getValidation() == 1) {
												echo "Validé";
											} else {
												echo "Non validé";
											}?>
											<hr color="black">
											<h4 class="noir sansBg" >Praticien : <?= $praticien->getNom()." ".$praticien->getPrenom(); ?> <h4>
											<h4 class="noir sansBg" ><?=  $praticien->getAdresse(); ?></h4>
											<h4 class="noir sansBg" ><?=  $praticien->getVille(); ?></h4>
											<h4 class="noir sansBg" ><?=  $praticien->getTypePraticien(); ?></h4>
										<?php 
										}								
											?></h2>
