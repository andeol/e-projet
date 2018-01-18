<?php

require(dirname(__DIR__)."/Entities/Risque.php");

class RisqueManager extends EntityManager
{
	// Properties
	

	// Functions

	// Default Builder
	function __construct($con)
	{
		$this->connection = $con;
	}

	// Adding an Resultat object to the database
	function add(Risque $risque)
	{
		$queryString = "insert into Risque values(NULL, '".$risque->getProjet()->getId()."','".$risque->getLibelle()."')";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Risque insertion failed!";
		}
	}

	function update(Risque $risque)
	{
		
		$queryString = "update Risque set pro_id = '".$risque->getProjet()->getId()."', libelle = '".$risque->getLibelle()."' where id = '".$risque->getId()."'";
		//echo $queryString;
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Risque update failed!";
		}
	}

	function delete(Risque $risque)
	{
		$queryString = "delete from Risque where id='".$risque->getId()."'";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Risque deletion failed!";
		}
	}

	function deleteByProjet(Projet $projet)
	{
		$queryString = "delete from Risque where pro_id='".$projet->getId()."'";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Risque deletion failed!";
			return false;
		}
		return true;
	}

	function getByProjet($projet)
	{
		$risque = NULL;

		$queryString = "select id, libelle from Risque where pro_id = '".$projet->getId()."'";
		$result = $this->connection->query($queryString);

		if (!$result)
			echo "Reading failed!";
		else
		{
			if ($result->num_rows < 1)
				return NULL;
			else
			{
				$risques = array();
				while ($row = $result->fetch_array(MYSQLI_NUM)){
					$risques[] = new Risque($row[0], $row[1], $projet);
				}
			}
		}
		return $risques;
	}

	function deleteAll()
	{
		$queryString = "delete from Risque";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Error when deleting all project risks!";
			return false;
		}
		return true;
	}

}
