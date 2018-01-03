<?php

require(dirname(__DIR__)."/Entities/Projet.php");

class ProjetManager extends EntityManager
{
	// Properties
	

	// Functions

	// Default Builder
	function __construct($con)
	{
		$this->connection = $con;
	}

	// Adding an Projet object to the database
	function add(Projet $projet)
	{
		$queryString = "insert into Projet values(NULL, '".$projet->getChefProjet()->getId()."','".$projet->getCode()."', '".$projet->getIntitule()."', '".$projet->getObjet()."', '".$projet->getDescription()."', '".$projet->getDuree()."', '".$projet->getDateDemarrage()."', '".$projet->getCout()."', '".$projet->getMaitriseOeuvre()."', '".$projet->getFinancement()."', '".$projet->getCoucheSI()."', '".$projet->getPerspectives()."')";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Projet insertion failed!";
		}
	}

	function update(Projet $projet)
	{
		$queryString = "update Projet set che_id = '".$projet->getChefProjet()->getId()."', code = '".$projet->getCode()."', intitule = '".$projet->getIntitule()."', objet = '".$projet->getObjet()."', description = '".$projet->getDescription()."', duree = '".$projet->getDuree()."', dateDemarrage = '".$projet->getDateDemarrage()."', cout = '".$projet->getCout()."', maitriseOeuvre = '".$projet->getMaitriseOeuvre()."', financement = '".$projet->getFinancement()."', coucheSI = '".$projet->getCoucheSI()."', perspectives = '".$projet->getPerspectives()."'  where id = '".$Projet->getId()."'";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Projet insertion failed!";
		}
	}

	function delete(Projet $projet)
	{
		$queryString = "delete from Projet where id='".$projet->getId()."'";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Projet deletion failed!";
		}
	}
}