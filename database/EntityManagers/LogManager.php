<?php

require(dirname(__DIR__)."/Entities/Log.php");

class LogManager extends EntityManager
{
	// Properties
	

	// Functions

	// Default Builder
	function __construct($con)
	{
		$this->connection = $con;
	}

	// Adding an activity object to the database
	function add(Log $log)
	{
		$queryString = "insert into Log values(NULL, '".$log->getProjet()->getId()."', '".$log->getDate()."','".$log->getAction()."')";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Log insertion failed!";
		}
	}

	function update(Log $log)
	{
		$queryString = "update Log set pro_id = '".$log->getProjet()->getId()."', date = '".$log->getDate()."', duree = '".$log->getDate()."', action = '".$log->getaction()."' where id = '".$log->getId()."'";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Log update failed!";
		}
	}

	function delete(Log $log)
	{
		$queryString = "delete from Log where id='".$log->getId()."'";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Log deletion failed!";
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
