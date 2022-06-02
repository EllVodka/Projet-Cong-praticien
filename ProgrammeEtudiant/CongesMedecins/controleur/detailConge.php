<?php
header( 'content-type: text/html; charset=utf-8' );

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.conge.inc.php";
include_once "$racine/modele/bd.praticien.inc.php";


if(isset($_GET['admin'])){

// recuperation des donnees GET, POST, et SESSION
$listeConges = getConges();
$idC = $_GET["idC"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$unConge = getCongeByIdC($idC);
$praticien = $unConge->getPraticien();


// appel du script de vue qui permet de gerer l'affichage des donnees

    $titre = "detail d'un congé";
    include "$racine/vue/enteteAdmin.html.php";
    include "$racine/vue/vueDetailCongeAdmin.php";
    include "$racine/vue/pied.html.php";
}else{ 

// recuperation des donnees GET, POST, et SESSION
$identifiantP = getPraticienLoggedOn();
$listeConges = getCongesByPraticien($identifiantP);
$idC = $_GET["idC"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$plusieursConge=false;
$unConge = getCongeByIdC($idC);
$praticien = $unConge->getPraticien();


// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "detail d'un congé";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueDetailConge.php";
include "$racine/vue/pied.html.php";}
?>