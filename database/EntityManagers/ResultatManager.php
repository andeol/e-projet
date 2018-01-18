<?php

require(dirname(__DIR__)."/Entities/Resultat.php");

class ResultatManager extends EntityManager
{
	// Properties
	

	// Functions

	// Default Builder
	function __construct($con)
	{
		$this->connection = $con;
	}

	// Adding an Resultat object to the database
	function add(Resultat $resultat)
	{
		$queryString = "insert into Resultat values(NULL, '".$resultat->getProjet()->getId()."','".$resultat->getLibelle()."', '".$resultat->getIndicateurs()."')";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Resultat insertion failed!";
		}
	}

	function update(Resultat $resultat)
	{
		
		$queryString = "update Resultat set pro_id = '".$resultat->getProjet()->getId()."', libelle = '".$resultat->getLibelle()."', indicateurs = '".$resultat->getIndicateurs()."' where id = '".$resultat->getId()."'";
		//echo $queryString;
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Resultat update failed!";
		}
	}

	function delete(Resultat $resultat)
	{
		$queryString = "delete from Resultat where id='".$resultat->getId()."'";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Resultat deletion failed!";
		}
	}

	function deleteByProjet(Projet $projet)
	{
		$queryString = "delete from Resultat where pro_id='".$projet->getId()."'";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Resultat deletion failed!";
			return false;
		}
		return true;
	}

	function getByProjet($projet)
	{
		$resultats = NULL;

		$queryString = "select id, libelle, indicateurs from Resultat where pro_id = '".$projet->getId()."'";
		$result = $this->connection->query($queryString);

		if (!$result)
			echo "Reading failed!";
		else
		{
			if ($result->num_rows < 1)
				return NULL;
			else
			{
				$resultats = array();
				while ($row = $result->fetch_array(MYSQLI_NUM)){
					$resultats[] = new Resultat($row[0], $row[1], $row[2], $projet);
				}
			}
		}
		return $resultats;
	}

	function deleteAll()
	{
		$queryString = "delete from Resultat";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Error when deleting all project achievements!";
			return false;
		}
		return true;
	}
}
