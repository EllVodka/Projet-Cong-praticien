<?php
	header( 'content-type: text/html; charset=utf-8' );

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.utilisateur.inc.php";

$erreur= "";
//verification si les champs ne sont pas vides
if (isset($_POST['inscription']))
{
	if (isset($_POST['mdpP']) AND isset($_POST['mdpP2']) AND isset($_POST['idP']) AND isset($_POST['nomP']))
	{
	//recupération des POST
		$idP = $_POST['idP'];
		$nomP = $_POST['nomP'];
		$mdpP = $_POST['mdpP'];
		$mdpP2 = $_POST['mdpP2'];
		
		if ($mdpP == $mdpP2) {
			if(Inscription($idP,$mdpP,$nomP))
			{
				  $destination = "https://localhost/mission2/ProgrammeEtudiant/CongesMedecins/?action=deconnexion";
  			header('Location: '.$destination);
			}
			

		}
		
	}
	
}
else


$titre = "inscription";

include "$racine/vue/entete.html.php";
include "$racine/vue/vueInscription.php";
include "$racine/vue/pied.html.php";
?>