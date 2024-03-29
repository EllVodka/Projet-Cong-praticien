<?php
header( 'content-type: text/html; charset=utf-8' );

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.conge.inc.php";
include_once "$racine/modele/bd.Praticien.inc.php";
include_once "$racine/modele/Authentification.inc.php";

  // recuperation des donnees GET, POST, et SESSION
   $debut = $_POST["date_debut"];      
   $fin = $_POST["date_fin"];

if($debut > $fin)
{
  echo "dates incorrectes";

  // appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
  include "$racine/vue/entete.html.php";
  include "$racine/vue/vueAjouterConge.php"; 
  include "$racine/vue/pied.html.php";
}
else
{
  // enregistrement des donnees
  $idP = getPraticienLoggedOn();
  $idPraticien = getPraticienByIdP($idP)->getId();

  $idc = insertConge($debut, $fin, $idPraticien);
                                   
  // appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
  $listeConges = getCongesByPraticien($idP);

  // appel du script de vue qui permet de gerer l'affichage des donnees

$destination ="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?action=listeConge";
  			header('Location: '.$destination);
}
