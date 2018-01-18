  <?php

require(dirname(__DIR__)."/Entities/CoucheSI.php");

class CoucheSIManager extends EntityManager
{
	// Properties
	

	// Functions

	// Default Builder
	function __construct($con)
	{
		$this->connection = $con;
	}

	// Adding an activity object to the database
	function add(CoucheSI $coucheSI)
	{
		$record = $this->getByLibelle($coucheSI->getLibelle());
		
		if ($record == NULL){
			$queryString = "insert into CoucheSI values(NULL,'".$coucheSI->getLibelle()."')";
			$result = $this->connection->query($queryString);
			if (!$result)
			{
				echo "CoucheSI insertion failed!";
			}
			return $this->getBy($coucheSI->getLibelle());
		}
		return $record;
	}

	function update(CoucheSI $coucheSI)
	{
		$queryString = "update CoucheSI set libelle = '".$coucheSI->getLibelle()."' where id = '".$coucheSI->getId()."'";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "CoucheSI update failed!";
		}
	}

	function delete(CoucheSI $coucheSI)
	{
		$queryString = "delete from CoucheSI where id='".$coucheSI->getId()."'";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "CoucheSI deletion failed!";
		}
	}

	function getAll()
	{
		$couchesSI = NULL;

		$queryString = "select id, libelle from CoucheSI";
		$result = $this->connection->query($queryString);

		if (!$result)
			echo "Reading failed!";
		else
		{
			if ($result->num_rows < 1)
				return NULL;
			else
			{
				$couchesSI = array();
				while ($row = $result->fetch_array(MYSQLI_NUM)){
					$couchesSI[] = new CoucheSI($row[0], $row[1]);
				}
			}
		}
		return $couchesSI;
	}

	function getByLibelle($libelle)
	{
		$coucheSI = NULL;
		$queryString = "select id, libelle from CoucheSI where libelle = '".$libelle."'";
		//echo $queryString;
		$result = $this->connection->query($queryString);

		if (!$result)
			echo "Reading failed!";
		else
		{
			if ($result->num_rows >= 1)
			{
				if ($row = $result->fetch_array(MYSQLI_NUM)){
					$coucheSI = new CoucheSI($row[0], $row[1]);
				}
			}
		}
		return $coucheSI;
	}

	function getById($id)
	{
		$coucheSI = NULL;
		$queryString = "select id, libelle from CoucheSI where id = '".$id."'";
		//echo $queryString;
		$result = $this->connection->query($queryString);

		if (!$result)
			echo "Reading failed!";
		else
		{
			if ($result->num_rows >= 1)
			{
				if ($row = $result->fetch_array(MYSQLI_NUM)){
					$coucheSI = new CoucheSI($row[0], $row[1]);
				}
			}
		}
		return $coucheSI;
	}

	function deleteAll()
	{
		$queryString = "delete from CoucheSI";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Error when deleting all the SI layers!";
			return false;
		}
		return true;
	}
}

