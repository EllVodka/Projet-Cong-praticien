 <?php
header( 'content-type: text/html; charset=utf-8' );

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.conge.inc.php";
include_once "$racine/modele/bd.praticien.inc.php";

  // recuperation des donnees GET, POST, et SESSION
  $identifiantP = getPraticienLoggedOn();
  $listeConges = getCongesByPraticien($identifiantP);
  
  $debut = $_POST["date_debut"];      
  $fin = $_POST["date_fin"];
  $idC = $_GET["idC"];

  
if($debut > $fin)
{
  $plusieursConge=true;
  echo "dates incorrectes";

  // appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
  $unConge = getCongesByPraticien($identifiantP);
  
  include "$racine/vue/entete.html.php";
  include "$racine/vue/vueModifierConge.php"; 
  include "$racine/vue/pied.html.php";
}
else
{
  $plusieursConge=false;
  // enregistrement des donnees
  $ret = updateConge($idC,$debut, $fin);
                                   
// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
  $unConge = getCongeByIdC($idC);
  $praticien = $unConge->getPraticien();

    // appel du script de vue qui permet de gerer l'affichage des donnees
  $titre = "detail d'un congé";
  include "$racine/vue/entete.html.php";
  include "$racine/vue/vueDetailConge.php";
  include "$racine/vue/pied.html.php";
}
?>