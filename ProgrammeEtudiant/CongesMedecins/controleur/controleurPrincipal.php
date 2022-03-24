<?php
header( 'content-type: text/html; charset=utf-8' );

function controleurPrincipal($action)
{
    $lesActions = array();
    $lesActions["defaut"] = "aFaire.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["listeConge"] = "listeCongesPraticien.php";
    $lesActions["detailConge"] = "detailConge.php";
    $lesActions["modifierConge"] = "modifierConge.php";
    $lesActions["modificationConge"] = "modificationConge.php";
    $lesActions["supprimerConge"] = "supprimerConge.php";
    $lesActions["ajoutConge"] = "ajoutConge.php";
    $lesActions["ajoutConge"] = "ajoutConge.php";
    $lesActions["inscription"] = "inscription.php";
    $lesActions["admin"] = "admin.php";
 
    if (array_key_exists($action, $lesActions))
    {
        return $lesActions[$action];
    } 
    else
    {
        return $lesActions["defaut"];
    }
}
?>