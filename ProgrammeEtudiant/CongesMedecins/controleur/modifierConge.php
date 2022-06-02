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
// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$unConge = getCongesByPraticien($identifiantP);
include "$racine/vue/entete.html.php";
include "$racine/vue/vueModifierConge.php"; 
include "$racine/vue/pied.html.php";
?>