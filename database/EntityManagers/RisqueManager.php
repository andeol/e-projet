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
		$queryString = "insert into Risque values(NULL, '".$Risque->getProjet()->getId()."','".$risque->getLibelle()."')";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Risque insertion failed!";
		}
	}

	function update(Risque $risque)
	{
		
		$queryString = "update Resultat set pro_id = '".$risque->getProjet()->getId()."','".$risque->getLibelle()."' where id = '".$risque->getId()."'";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Risque insertion failed!";
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

}
