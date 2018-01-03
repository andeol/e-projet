<?php

require(dirname(__DIR__)."/Entities/ChefProjet.php");

class ChefProjetManager extends EntityManager
{
	// Properties
	

	// Functions

	// Default Builder
	function __construct($con)
	{
		$this->connection = $con;
	}

	// Adding an activity object to the database
	function add(ChefProjet $chefProjet)
	{
		$queryString = "insert into ChefProjet values(NULL, '".$chefProjet->getNom()."','".$chefProjet->getPrenoms()."', '".$chefProjet->getCode()."')";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "ChefProjet insertion failed!";
		}
	}

	function update(ChefProjet $chefProjet)
	{
		$queryString = "update ChefProjet set nom = '".$chefProjet->getNom()."', prenoms = '".$chefProjet->getPrenoms()."', code = '".$chefProjet->getCode()."' where id = '".$chefProjet->getId()."'";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "ChefProjet update failed!";
		}
	}

	function delete(ChefProjet $chefProjet)
	{
		$queryString = "delete from ChefProjet where id='".$chefProjet->getId()."'";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "ChefProjet deletion failed!";
		}
	}

	function getById($id)
	{
		$queryString = "select id, libelle, dateDebut, duree from Activite where id = '".$id."'";
		$result = $this->connection->query($queryString);
		if (!$result)
			echo "Reading failed!";
		else
		{
			if ($result->num_rows < 1)
				return NULL;
			else
			{
				//$activite = new Activite($result->)
			}
		}
	}
}