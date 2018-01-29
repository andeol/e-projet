 <?php

require(dirname(__DIR__)."/Entities/SourceFinancement.php");

class SourceFinancementManager extends EntityManager
{
	// Properties
	

	// Functions

	// Default Builder
	function __construct($con)
	{
		$this->connection = $con;
	}

	// Adding an activity object to the database
	function add(SourceFinancement $sourceFinancement)
	{
		$record = $this->getByLibelle($sourceFinancement->getLibelle());
		if ($record == NULL){

			$queryString = "insert into SourceFinancement values(NULL,'".$this->connection->real_escape_string($sourceFinancement->getLibelle())."')";
			$result = $this->connection->query($queryString);
			if (!$result)
			{
				echo "SourceFinancement insertion failed!";
			}
			return $this->getBy($sourceFinancement->getLibelle());
		}
		return $record;
	}

	function update(SourceFinancement $sourceFinancement)
	{
		$queryString = "update SourceFinancement set libelle = '".$this->connection->real_escape_string($sourceFinancement->getLibelle())."' where id = '".$sourceFinancement->getId()."'";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "SourceFinancement update failed!";
		}
	}

	function delete(SourceFinancement $sourceFinancement)
	{
		$queryString = "delete from SourceFinancement where id='".$sourceFinancement->getId()."'";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "SourceFinancement deletion failed!";
		}
	}

	function getAll()
	{
		$sourcesFinancement = NULL;

		$queryString = "select id, libelle from SourceFinancement";
		$result = $this->connection->query($queryString);

		if (!$result)
			echo "Reading failed!";
		else
		{
			if ($result->num_rows >= 1)
			{
				$sourcesFinancement = array();
				while ($row = $result->fetch_array(MYSQLI_NUM)){
					$sourcesFinancement[] = new SourceFinancement($row[0], $row[1]);
				}
			}
		}
		return $sourcesFinancement;
	}

	function getByLibelle($libelle)
	{
		$sourceFinancement = NULL;
		$queryString = "select id, libelle from SourceFinancement where libelle = '".$libelle."'";
		$result = $this->connection->query($queryString);

		if (!$result)
			echo "Reading failed!";
		else
		{
			if ($result->num_rows >= 1)
			{
				if ($row = $result->fetch_array(MYSQLI_NUM)){
					$sourceFinancement = new sourceFinancement($row[0], $row[1]);
				}
			}
		}
		return $sourceFinancement;
	}

	function getById($id)
	{
		$sourceFinancement = NULL;
		$queryString = "select id, libelle from SourceFinancement where id = '".$id."'";
		$result = $this->connection->query($queryString);

		if (!$result)
			echo "Reading failed!";
		else
		{
			if ($result->num_rows >= 1)
			{
				if ($row = $result->fetch_array(MYSQLI_NUM)){
					$sourceFinancement = new sourceFinancement($row[0], $row[1]);
				}
			}
		}
		return $sourceFinancement;
	}

	function deleteAll()
	{
		$queryString = "delete from SourceFinancement";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Error when deleting all project finance sources!";
			return false;
		}
		return true;
	}

}
