<?php

require(dirname(__DIR__)."/Entities/Activite.php");

class ActiviteManager extends EntityManager
{
	// Properties
	

	// Functions

	// Default Builder
	function __construct($con)
	{
		$this->connection = $con;
	}

	// Adding an activity object to the database
	function add(Activite $activite)
	{
		$queryString = "insert into Activite values(NULL, '".$activite->getProjet()->getId()."', '".$activite->getLibelle()."','".$activite->getDateDebut()."', '".$activite->getDuree()."')";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Activite insertion failed!";
		}
	}

	function update(Activite $activite)
	{
		$queryString = "update Activite set pro_id = '".$activite->getProjet()->getId()."', libelle = '".$activite->getLibelle()."', dateDebut = '".$activite->getDateDebut()."', duree = '".$activite->getDuree()."' where id = '".$activite->getId()."'";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Activite update failed!";
		}
	}

	function delete(Activite $activite)
	{
		$queryString = "delete from Activite where id='".$activite->getId()."'";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Activite deletion failed!";
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
