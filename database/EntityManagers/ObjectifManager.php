<?php

require(dirname(__DIR__)."/Entities/Objectif.php");

class ObjectifManager extends EntityManager
{
	// Properties
	

	// Functions

	// Default Builder
	function __construct($con)
	{
		$this->connection = $con;
	}

	// Adding an activity object to the database
	function add(Objectif $objectif)
	{
		echo "yes";
		$queryString = "insert into Objectif values(NULL, '".$objectif->getProjet()->getId()."','".$objectif->getLibelle()."')";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Objectif insertion failed!";
		}
	}

	function update(Objectif $objectif)
	{
		$queryString = "update Objectif set libelle = '".$objectif->getLibelle()."', pro_id = '".$objectif->getProjet()->getId()."' where id = '".$objectif->getId()."'";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Objectif update failed!";
		}
	}

	function delete(Objectif $objectif)
	{
		$queryString = "delete from Objectif where id='".$objectif->getId()."'";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Objectif deletion failed!";
		}
	}

	function getByProjet($projet)
	{
		$objectifs = NULL;

		$queryString = "select id, libelle from Objectif where pro_id = '".$projet->getId()."'";
		$result = $this->connection->query($queryString);

		if (!$result)
			echo "Reading failed!";
		else
		{
			if ($result->num_rows < 1)
				return NULL;
			else
			{
				$objectifs = array();
				while ($row = $result->fetch_array(MYSQLI_NUM)){
					$objectifs[] = new Objectif($row[0], $row[1], $projet);
				}
			}
		}
		return $objectifs;
	}
}
