<?php
header( 'content-type: text/html; charset=utf-8' );

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.conge.inc.php";
include_once "$racine/modele/bd.praticien.inc.php";


// recuperation des donnees GET, POST, et SESSION
$idC=$_GET['idC'];
$valid=$_GET['valid'];
if($valid==1){
    $valid=0;
}else{
    $valid=1;
}
updateValideConge($idC,$valid);
// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$unConge = getCongesByPraticien($identifiantP);
$destination = "https://localhost/mission2/ProgrammeEtudiant/CongesMedecins/?action=listeCongeAdmin";
  			header('Location: '.$destination);
?>