<?php
header( 'content-type: text/html; charset=utf-8' );

include_once "bd.praticien.inc.php";

function login($identifiantP, $mdpP)
{
    if (!isset($_SESSION))
    {
        session_start();
    }

    $util = getPraticienByIdentifiantP($identifiantP);
    $mdpBD = $util->getMdp();
    if (trim($mdpBD) == trim($mdpBD))
    {
        // le mot de passe est celui de l'utilisateur dans la base de donnees
        $_SESSION["identifiantP"] = $identifiantP;
        $_SESSION["mdpP"] = $mdpBD;
    }
}

function logout()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["identifiantP"]);
    unset($_SESSION["mdpP"]);
    session_destroy();
}

function getPraticienLoggedOn()
{
    if (isLoggedOn()){
        $ret = $_SESSION["idP"];
    }
    else {
        $ret = "";
    }
    return $ret;
}

function isLoggedOn()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["idP"])) {
        $util = getPraticienByIdentifiantP($_SESSION["idP"]);
        if ($util->getId() == $_SESSION["idP"] ) {
            if (password_verify($_SESSION["mdpP"],$util->getMdp())) {
                $ret = true;
            }
            
        }
    }
    return $ret;
}
?>