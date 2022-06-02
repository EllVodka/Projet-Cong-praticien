<?php
header( 'content-type: text/html; charset=utf-8' );

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/bd.praticien.inc.php";
include_once "$racine/modele/authentification.inc.php";


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$identifiantP = getPraticienLoggedOn();
$resultat = getPraticienByIdP($identifiantP);
// traitement si necessaire des donnees recuperees

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Profil de ".$resultat->getNom();
include "$racine/vue/entete.html.php";
include "$racine/vue/vueProfil.php";
include "$racine/vue/pied.html.php";


