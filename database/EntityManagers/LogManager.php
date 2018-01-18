<?php

require(dirname(__DIR__)."/Entities/Log.php");

class LogManager extends EntityManager
{
	// Properties
	

	// Functions

	// Default Builder
	function __construct($con, ProjetManager $projetManager)
	{
		$this->connection = $con;
		$this->projetManager = $projetManager;
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
		return $this->getBy($log->getProjet(), $log->getDate(), $log->getAction());
	}

	function update(Log $log)
	{
		$queryString = "update Log set pro_id = '".$log->getProjet()->getId()."', date = '".$log->getDate()."', action = '".$log->getAction()."' where id = '".$log->getId()."'";
		//echo $queryString;
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

	function getByProjet($projet)
	{
		$logs = NULL;

		$queryString = "select id, date, action from Log where pro_id = '".$projet->getId()."'";
		//echo $queryString;
		$result = $this->connection->query($queryString);

		if (!$result)
			echo "Reading failed!";
		else
		{
			if ($result->num_rows < 1)
				return NULL;
			else
			{
				$logs = array();
				while ($row = $result->fetch_array(MYSQLI_NUM)){
					$logs[] = new Log($row[0], $row[1], $row[2], $projet);
				}
			}
		}
		return $logs;
	}

	function getBy(Projet $projet, $date, $action)
	{
		$log = NULL;
		$queryString = "select id, date, action from Log where date = '".$date."' and action = '".$action."' and pro_id = '".$projet->getId()."'";
		//echo $queryString;
		$result = $this->connection->query($queryString);

		if (!$result)
			echo "Reading failed!";
		else
		{
			if ($result->num_rows >= 1)
			{
				if ($row = $result->fetch_array(MYSQLI_NUM)){
					$log = new Log($row[0], $row[1], $row[2], $projet);
				}
			}
		}
		return $log;
	}

	function deleteAll()
	{
		$queryString = "delete from Log";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Error when deleting all projects' logs!";
			return false;
		}
		return true;
	}
}
