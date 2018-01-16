  <?php

require(dirname(__DIR__)."/Entities/MaitriseOeuvre.php");

class MaitriseOeuvreManager extends EntityManager
{
	// Properties
	

	// Functions

	// Default Builder
	function __construct($con)
	{
		$this->connection = $con;
	}

	// Adding an activity object to the database
	function add(MaitriseOeuvre $maitriseOeuvre)
	{
		$record = $this->getBy($maitriseOeuvre->getLibelle());
		if ($record == NULL ){

			$queryString = "insert into MaitriseOeuvre values(NULL,'".$maitriseOeuvre->getLibelle()."')";
			$result = $this->connection->query($queryString);
			if (!$result)
			{
				echo "MaitriseOeuvre insertion failed!";
			}
			return $this->getBy($maitriseOeuvre->getLibelle());
		}
		return $record;
	}

	function update(MaitriseOeuvre $maitriseOeuvre)
	{
		$queryString = "update MaitriseOeuvre set libelle = '".$maitriseOeuvre->getLibelle()."' where id = '".$maitriseOeuvre->getId()."'";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "MaitriseOeuvre update failed!";
		}
	}

	function delete(MaitriseOeuvre $maitriseOeuvre)
	{
		$queryString = "delete from MaitriseOeuvre where id='".$maitriseOeuvre->getId()."'";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "MaitriseOeuvre deletion failed!";
		}
	}

	function getAll()
	{
		$maitrisesOeuvre = NULL;

		$queryString = "select id, libelle from MaitriseOeuvre";
		$result = $this->connection->query($queryString);

		if (!$result)
			echo "Reading failed!";
		else
		{
			if ($result->num_rows < 1)
				return NULL;
			else
			{
				$maitrisesOeuvre = array();
				while ($row = $result->fetch_array(MYSQLI_NUM)){
					$maitrisesOeuvre[] = new MaitriseOeuvre($row[0], $row[1]);
				}
			}
		}
		return $maitrisesOeuvre;
	}

	function getBy($libelle)
	{
		$maitriseOeuvre = NULL;
		$queryString = "select id, libelle from MaitriseOeuvre where libelle = '".$libelle."'";
		$result = $this->connection->query($queryString);

		if (!$result)
			echo "Reading failed!";
		else
		{
			if ($result->num_rows >= 1){
				if ($row = $result->fetch_array(MYSQLI_NUM)){
					$maitriseOeuvre = new MaitriseOeuvre($row[0], $row[1]);
				}
			}
		}
		return $maitriseOeuvre;
	}

	function getById($id)
	{
		$maitriseOeuvre = NULL;
		$queryString = "select id, libelle from MaitriseOeuvre where id = '".$id."'";
		$result = $this->connection->query($queryString);

		if (!$result)
			echo "Reading failed!";
		else
		{
			if ($result->num_rows >= 1){
				if ($row = $result->fetch_array(MYSQLI_NUM)){
					$maitriseOeuvre = new MaitriseOeuvre($row[0], $row[1]);
				}
			}
		}
		return $maitriseOeuvre;
	}
}
