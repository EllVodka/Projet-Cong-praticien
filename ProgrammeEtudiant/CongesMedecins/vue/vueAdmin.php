<?php header( 'content-type: text/html; charset=utf-8' ); ?>

<fieldset>
	<legend class="texte">Formulaire inscrption</legend>
	<form method="POST" action="./?action=admin">
		<label for="idP">Id</label>
		<input type="text" name="idP" required class="droite">

		<label>Nom</label>
		<input type="text" name="nomP" required class="droite">

		<label>Mot de passe</label>
		<input type="password" name="mdpP" required class="droite">

		<label>Retapez votre mot de passe </label>
		<input type="password" name="mdpP2" required class="droite">

		<br><br>
		<input type="submit" name="inscription" value="Inscription" class="boutton">
	</form>
</fieldset>

<fieldset>
	<legend class="texte">Affichage des praticien</legend>
	<table>
		<thead>
				<th>Id</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Adresse</th>
				<th>Coef de notoriete</th>
				<th>Code type</th>
				<th>Id de la ville</th>
		</thead>
		<tbody>
			<?php 
			$total = count($resultat);
			print($total);
			
			for ($i=0; $i < count($resultat); $i++) { 
			?>
			<tr>
				<td><?php echo($resultat[$i]->id); ?></td>
				<td><?php echo($resultat[$i]->nom); ?></td>
				<td><?php echo($resultat[$i]->prenom); ?></td>
				<td><?php echo($resultat[$i]->adresse); ?></td>
				<td><?php echo($resultat[$i]->coef_notoriete); ?></td>
				<td><?php echo($resultat[$i]->code_type_praticien); ?></td>
				<td><?php echo($resultat[$i]->id_ville); ?></td>
			
			<?php	
			}
			?>
		</tbody>

		
	</table>
</fieldset>
<fieldset>
	<legend class="texte">Mise a jour d'un praticien</legend>
	<form method="POST" action="./?action=admin">
		<label>Id</label><input type="text" name="id" placeholder="Entrez l'id">
	<label>Nom</label><input type="text" name="nom" placeholder="Entrez le nom">
	<label>Prenom</label><input type="text" name="prenom" placeholder="Entrez le prenom">
	<label>Adresse</label><input type="text" name="adresse" placeholder="Entrez l'adresse">
	<label>Coef de notoriete</label><input type="text" name="coefNoto" placeholder="Entrez le coef de notorieté">
	<label>Code type</label><input type="text" name="codeType" placeholder="Entrez le code correspondant au praticien">
	<label>Id de la ville</label><input type="text" name="idVille" placeholder="Entrez l'id de la ville">
	<br><br>
	<input type="submit" name="Envoyer" class="boutton">
	</form>

</fieldset>

<fieldset>
	<legend class="texte">Suppression de praticien</legend>
	<form method="POST" action="./?action=admin">
		<br>
		<label>Id du praticien a supprimer</label>
		<input type="text" name="idSupp" placeholder="Entrez l'id du praticien que vous souhaitez supprimez">
		<br>
		<input type="submit" name="Supprimer" class="boutton">
	</form>
</fieldset>
<div><?php echo $erreur; ?></div>