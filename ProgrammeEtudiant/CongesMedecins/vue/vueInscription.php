<?php header( 'content-type: text/html; charset=utf-8' ); ?>

<fieldset>
	<legend class="texte">Formulaire inscrption</legend>
	<form method="POST" action="">
		<label>Id</label>
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
<div><?php echo $erreur; ?></div>
