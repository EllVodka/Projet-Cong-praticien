<?php
header( 'content-type: text/html; charset=utf-8' );

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.utilisateur.inc.php";

// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["idP"]) && isset($_POST["mdpP"])){
    $idP=$_POST["idP"];
    $mdpP=$_POST["mdpP"];
}
else
{
    $identificationP="";
    $mdpP="";
}

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

// traitement si necessaire des donnees recuperees
;

if (Connexion($idP,$mdpP))
{ // si l'utilisateur est connecté on redirige vers la liste des congés du praticien
    if ($_POST['idP'] == "0" AND $_POST['mdpP'] == "root") 
{
    include "$racine/controleur/admin.php";
}
else
{
    include "$racine/controleur/listeCongesPraticien.php";
}
}
else
{ // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    // appel du script de vue 
    $titre = "authentification";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueAuthentification.php";
    include "$racine/vue/pied.html.php";
}

?>