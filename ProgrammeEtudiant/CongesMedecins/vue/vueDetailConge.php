<?php 

?>
<h1>Details Congé</h1>

<?php for ($i = 0; $i < count($unConge); $i++) { 
	?>
<p>Debut du congé : <?= date_format(new datetime($unConge->getDebut()),'d/m/Y'); ?> </p>
<p>Fin du congé : <?= date_format(new datetime($unConge[$i]->getFin()),'d/m/Y'); ?>  </p>
<p>Validation des congé : <?php if ($unConge[$i]->getValidation() == 1 ) 
{
	echo "Validé";
} 
else
{
	echo "Non validé";
} 
}?></p>