<?php
header( 'content-type: text/html; charset=utf-8' );

include_once "bd.inc.php";
include_once "$racine/classes/praticien.php";

function getPraticiens()
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT praticien.id as idP, praticien.nom as nomP, prenom, adresse, coef_notoriete, libelle, ville.nom as villeP, salaire.salaire AS salaire , utilisateur.mdp AS mdp FROM praticien INNER JOIN type_praticien ON code_type_praticien = code INNER JOIN ville ON id_ville = ville.id INNER JOIN salaire ON praticien.id = salaire.id INNER JOIN utilisateur ON praticien.id = utilisateur.id  ");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne)
        {
            $resultat[] = new praticien($ligne['idP'],$ligne['nomP'],$ligne['prenom'],$ligne['adresse'],$ligne['coef_notoriete'],$ligne['salaire'],$ligne['mdp'],$ligne['libelle'],$ligne['villeP']);
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getPraticienByIdP($idP)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT praticien.id AS idP, praticien.nom AS nomP, prenom, adresse, coef_notoriete, libelle, ville.nom as villeP, utilisateur.mdp AS mdpP, salaire.salaire AS salaireP FROM praticien INNER JOIN type_praticien ON code_type_praticien = type_praticien.code INNER JOIN ville on id_ville = ville.id INNER JOIN utilisateur ON praticien.id = utilisateur.id INNER JOIN salaire ON praticien.id = salaire.id WHERE praticien.id=:idP;");
        $req->bindValue(':idP', $idP, PDO::PARAM_INT);
        $req->execute();
        
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        $resultat = new praticien($ligne['idP'],$ligne['nomP'],$ligne['prenom'],$ligne['adresse'],$ligne['coef_notoriete'],$ligne['salaireP'],$ligne['mdpP'],$ligne['libelle'],$ligne['villeP']);

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getPraticienByIdentifiantP($identifiantP)
{
    try
    {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT praticien.id as idP, praticien.nom as nomP, prenom, adresse, coef_notoriete, libelle, ville.nom as villeP, salaire.salaire AS salaire , utilisateur.mdp AS mdp FROM praticien INNER JOIN type_praticien ON code_type_praticien = code INNER JOIN ville ON id_ville = ville.id INNER JOIN salaire ON praticien.id = salaire.id INNER JOIN utilisateur ON praticien.id = utilisateur.id WHERE praticien.id = :identifiantP");
        $req->bindValue(':identifiantP', $identifiantP, PDO::PARAM_STR);
        $req->execute();
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        $resultat = new praticien($ligne['idP'],$ligne['nomP'],$ligne['prenom'],$ligne['adresse'],$ligne['coef_notoriete'],$ligne['salaire'],$ligne['mdp'],$ligne['libelle'],$ligne['villeP']);
    }
    catch (PDOException $e)
    {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
?>