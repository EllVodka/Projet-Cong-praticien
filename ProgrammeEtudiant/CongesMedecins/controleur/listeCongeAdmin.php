<?php
header( 'content-type: text/html; charset=utf-8' );

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.conge.inc.php";
include_once "$racine/modele/bd.praticien.inc.php";
include_once "$racine/modele/authentification.inc.php";

// recuperation des donnees GET, POST, et SESSION
;

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

$listeConges = getConges();
// traitement si necessaire des donnees recuperees


// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Liste des congés de ";
    include "$racine/vue/enteteAdmin.html.php";

include "$racine/vue/vueListeCongeAdmin.php";
include "$racine/vue/pied.html.php";


?>