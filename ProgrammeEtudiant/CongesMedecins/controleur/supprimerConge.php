<?php
header( 'content-type: text/html; charset=utf-8' );

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.conge.inc.php";
//include_once "$racine/modele/authentification.inc.php";

  // recuperation des donnees GET, POST, et SESSION
  $idC = $_GET["idC"];
        
//  $mailU = getMailULoggedOn();

  // enregistrement des donnees
  $ret = delConge($idC);
if(isset($_GET['admin'])){
  $destination = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?action=listeCongeAdmin";
  header('Location: '.$destination);
}else{
  $destination = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?action=listeConge";
  header('Location: '.$destination);
}
  
?>