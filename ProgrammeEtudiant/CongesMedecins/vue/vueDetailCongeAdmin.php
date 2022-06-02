<?php
?>
<h1>Details Congé :</h1>


	<h2 class="noir sansBg">Debut du congé : <?= date_format(new datetime($unConge->getDebut()), 'd/m/Y'); ?> </h2>
	<h2 class="noir sansBg">Fin du congé : <?= date_format(new datetime($unConge->getFin()), 'd/m/Y'); ?> </h2>
	<h2 class="noir sansBg">Validation des congé : <?php if ($unConge->getValidation() == 1) {
												echo "Validé <br/>";
                                                ?>
                                                
                                                <?php
											} else {
												echo "Non validé";
											}?> 
                                            <form method="POST" action="./?action=changerConge&idC=<?= $unConge->getId()."&valid=".$unConge->getValidation() ?>">
                                                <input type="submit" name="changerConge" value="changerConge" class="boutton">
                                                </form>
											<hr color="black">
											<h4 class="noir sansBg" >Praticien : <?= $praticien->getNom()." ".$praticien->getPrenom(); ?> <h4>
											<h4 class="noir sansBg" ><?=  $praticien->getAdresse(); ?></h4>
											<h4 class="noir sansBg" ><?=  $praticien->getVille(); ?></h4>
											<h4 class="noir sansBg" ><?=  $praticien->getTypePraticien(); ?></h4>
							
</h2>