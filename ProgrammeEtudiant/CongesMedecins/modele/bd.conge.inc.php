<?php
header( 'content-type: text/html; charset=utf-8' );

include_once "bd.inc.php";
include_once "$racine/classes/conge.php";
include_once "bd.praticien.inc.php";

function getCongeByIdC($idC) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from repos where id=:idC");
        $req->bindValue(':idC', $idC, PDO::PARAM_INT);

        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        $resultat = new conge($ligne['id'],$ligne['dateDebut'],$ligne['dateFin'],$ligne['validation']);
        $resultat->setPraticien(getPraticienByIdP($ligne['idPraticien']));
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function getConges() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from repos");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $res = new conge($ligne['id'],$ligne['dateDebut'],$ligne['dateFin'],$ligne['validation']);
            $res->setPraticien(getPraticienByIdP($ligne['idPraticien']));
            $resultat[] = $res;
            //$resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getCongesByPraticien($idP) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT repos.id as idC, repos.dateDebut AS debut, repos.dateFin AS fin, validation, idPraticien from repos inner join praticien on idPraticien = praticien.id where repos.idPraticien = :idP;");
        $req->bindValue(':idP', $idP, PDO::PARAM_STR);

        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne)
        {
            $res = new conge($ligne['idC'],$ligne['debut'],$ligne['fin'],$ligne['validation']);
            $res->setPraticien( getPraticienByIdP($ligne['idPraticien']));
            $resultat[] = $res;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e)
    {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updateConge($idC, $debut, $fin) {
    try {
        $cnx = connexionPDO();
        
        $req = $cnx->prepare("update repos set dateDebut = :debut, dateFin = :fin where id = :idC");
        $req->bindValue(':debut', $debut, PDO::PARAM_STR);
        $req->bindValue(':fin', $fin, PDO::PARAM_STR);
        $req->bindValue(':idC', $idC, PDO::PARAM_INT);
        
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function insertConge($debut, $fin, $idPraticien)
{
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("INSERT INTO repos (dateDebut,dateFin,validation,idPraticien) values (:debut, :fin, 0, :idPraticien)");
        $req->bindValue(':debut', $debut, PDO::PARAM_STR);
        $req->bindValue(':fin', $fin, PDO::PARAM_STR);
        $req->bindValue(':idPraticien', $idPraticien, PDO::PARAM_INT);
        
        $resultat = $req->execute();

        $req = $cnx->prepare("SELECT max(id) as maxi from repos");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        if ($ligne)
        {
            $res = $ligne['maxi'];
        }

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $res;
}

function delConge($idC)
{
    try 
    {
        $pdo = connexionPDO();
        $requete = $pdo->prepare("DELETE FROM `repos` WHERE repos.id = :idC");
        $requete->bindValue(':idC',$idC);
        $requete->execute();
    } 
    catch (Exception $e) 
    {
        print "Erreur pour la suppresion ". $e->getMessage();
            
    }    
}