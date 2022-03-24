<?php
	include_once 'bd.inc.php';

	function DejaExiste($nom)
	{
		if (!isset($_SESSION))
    {
        session_start();
    }
    	try 
    	{
    		$pdo = connexionPDO();
    		$identique = $pdo->prepare("SELECT id FROM utilisateur WHERE nom=? limit 1;");
    		$identique->execute(array($nom));
    		$utilExiste = $identique->fetch(PDO::FETCH_OBJ);
    		if ($utilExiste) {
    			return true;
    		}
    		else
    		{
    			return false;
    		}
    	} 
    	catch (Exception $e) 
    	{
    		print "la fonction DejaExiste marche pas mon boug".$e->getMessage();
			return false;
    	}
		
	}

	function Inscription($id,$mdp,$nom)
	{
		if (!isset($_SESSION))
    {
        session_start();
    }
    	try 
    	{
    		$pdo = connexionPDO();
    		$identique = DejaExiste($nom);
			if ($identique) 
			{
				print "Login deja existe";
				return false;
			}
			else
			{
				$mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
				$inscription = $pdo->prepare("INSERT INTO utilisateur (id,nom,mdp) VALUES (?,?,?);");
				if($inscription->execute(array($id,$nom,$mdpHash)))
               return true;
           print "Le if marche pas mon boug".$e->getMessage();
				}
		}
		catch (Exception $e) 
    	{
			print "marche pas mon boug ".$e->getMessage();
			

    	}
    }


    function Connexion($id,$mdp)
    {
    	if (!isset($_SESSION))
    {
        session_start();
    }
    	try 
    	{
    		$pdo = connexionPDO();
    		$co = $pdo->prepare("SELECT id,mdp FROM utilisateur WHERE id = ?");
	$co->execute(array($id));
	$utilExiste = $co->fetch();
    		if ($utilExiste) 
    		{
    			$mdpEstCorrect = password_verify($mdp, $utilExiste['mdp']);
    			if($mdpEstCorrect == true)
    			{
    				$_SESSION['idP'] = $id;
    				$_SESSION['mdpP'] = $mdp;
    				return true;
    			}
    			else
    			{
    				$_SESSION['idP'] = "";
    				$_SESSION['mdpP'] = "";
    				return false;
    			}
    		}
    	}
    	catch (Exception $e)
    	{
    		print "sa marche pas mon boug ".$e->getMessage();
    	}
    }



 function EstConnecte()
    {
    	if (!isset($_SESSION)) 
    	{
    		session_start();
    	}
    	 $ret = false;

    if (isset($_SESSION["idP"])) {
        $util = getPraticienByIdP($_SESSION["idP"]);
        if (password_verify($_SESSION['mdpP'], $util->getMdp())) {
        	// code...
        }
        if ($util->getId() == $_SESSION["idP"] && $util->getMdp() == $_SESSION["mdpP"]) {
            $ret = true;
        }
    }
    return $ret;

    }

    function SelectP()
    {
    	try 
    	{
    		$pdo = connexionPDO();
    		$reqSelect = "SELECT praticien.* FROM praticien INNER JOIN utilisateur ON utilisateur.id = praticien.id;";
    		$listP = $pdo->query($reqSelect);
    		$resultat = $listP->fetchAll(PDO::FETCH_OBJ);
    		return $resultat;

    	}
    	catch(Exception $e)
    	{
    		print "echec de l'affichage des praticien".$e->getMessage();
    	}
    }

	function UpdatePraticien($id,$nom,$prenom,$adresse,$coefNoto,$codeTypeP,$idVille)
	{
		try
		{
			$pdo = connexionPDO();
			$reqUpt = "UPDATE praticien SET praticien.nom =:nom ,praticien.prenom = :prenom , praticien.adresse = :adresse , praticien.coef_notoriete = :coef , praticien.code_type_praticien = :code , praticien.id_ville = :idVille  WHERE praticien.id = :id";
			$query = $pdo->prepare($reqUpt);

			$query->bindValue(":nom",$nom,PDO::PARAM_STR);
			$query->bindValue(":prenom",$prenom,PDO::PARAM_STR);
			$query->bindValue(":adresse",$adresse,PDO::PARAM_STR);
			$query->bindValue(":coef",$coefNoto,PDO::PARAM_STR);
			$query->bindValue(":code",$codeTypeP,PDO::PARAM_STR);
			$query->bindValue(":idVille",$idVille, PDO::PARAM_STR);
			$query->bindValue(":id",$id,PDO::PARAM_STR);

			if($query->execute())
			{
				return true;
			}
			else{
				return false;
			}

			
		}
		catch(Exception $e)
    	{
    		print "echec de l'update des praticien".$e->getMessage();
    	}
	}

	function DeletePraticien($id)
	{
		try 
		{
			$pdo = connexionPDO();
			$requete = "DELETE FROM utilisateur WHERE utilisateur.id = :id ;";
			$del = $pdo->prepare($requete);
			$del->bindValue(":id",$id,PDO::PARAM_STR);
			$del->execute();
		} 
		catch (Exception $e)
		 {
			print "echec de la suppresion du praticien ".$e->getMessage();
		}
	}
?>