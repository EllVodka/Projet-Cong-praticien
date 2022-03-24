<?php
    header( 'content-type: text/html; charset=utf-8' );

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.utilisateur.inc.php";

$erreur= "";
//verification si les champs ne sont pas vides
if (isset($_POST['inscription']))
{
    if (isset($_POST['mdpP']) AND isset($_POST['mdpP2']) AND isset($_POST['idP']) AND isset($_POST['nomP']))
    {
    //recupération des POST
        $idP = $_POST['idP'];
        $nomP = $_POST['nomP'];
        $mdpP = $_POST['mdpP'];
        $mdpP2 = $_POST['mdpP2'];
        
        if ($mdpP == $mdpP2) {
            if(Inscription($idP,$mdpP,$nomP))
            {
                  $erreur = "inscription reussite";
            }
            

        }
        else
        {
            $erreur = "Mot de passe different";
        }
        
    }
    
}
$resultat = SelectP();

if (isset($_POST['Envoyer'])) 
{
    if(isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['coefNoto']) && isset($_POST['codeType']) && isset($_POST['idVille']))
    {

        UpdatePraticien($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['coefNoto'],$_POST['codeType'],$_POST['idVille']);
    }
}

if (isset($_POST['Supprimer'])) 
{
    if (isset($_POST['idSupp'])) 
    {
        DeletePraticien($_POST['idSupp']);
    }
}


$titre = "pageAdmin";

include "$racine/vue/enteteAdmin.html.php";
include "$racine/vue/vueAdmin.php";
include "$racine/vue/pied.html.php";
?>