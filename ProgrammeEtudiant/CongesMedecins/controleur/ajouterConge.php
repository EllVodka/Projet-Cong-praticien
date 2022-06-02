<?php
header( 'content-type: text/html; charset=utf-8' );

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}


  // recuperation des donnees GET, POST, et SESSION


  // appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
  include "$racine/vue/entete.html.php";
  include "$racine/vue/vueAjouterConge.php"; 
  include "$racine/vue/pied.html.php";
?>