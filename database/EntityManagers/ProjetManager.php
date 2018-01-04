<?php

require(dirname(__DIR__)."/Entities/Projet.php");

class ProjetManager extends EntityManager
{
	// Properties
	

	// Functions

	// Default Builder
	function __construct($con, ChefProjetManager $chefProjetManager)
	{
		$this->chefProjetManager = $chefProjetManager;
		$this->connection = $con;
	}

	// Adding an Projet object to the database
	function add(Projet $projet)
	{
		$queryString = "insert into Projet values(NULL, '".$projet->getChefProjet()->getId()."','".$projet->getCode()."', '".$projet->getIntitule()."', '".$projet->getObjet()."', '".$projet->getDescription()."', '".$projet->getDuree()."', '".$projet->getDateDemarrage()."', '".$projet->getCout()."', '".$this->connection->real_escape_string($projet->getMaitriseOeuvre())."', '".$projet->getFinancement()."', '".$projet->getCoucheSI()."', '".$projet->getPerspectives()."')";
		$result = $this->connection->query($queryString);

		if (!$result)
		{
			echo "Projet insertion failed! \n";
		}
	}

	function update(Projet $projet)
	{
		$queryString = "update Projet set che_id = '".$projet->getChefProjet()->getId()."', code = '".$projet->getCode()."', intitule = '".$projet->getIntitule()."', objet = '".$projet->getObjet()."', description = '".$projet->getDescription()."', duree = '".$projet->getDuree()."', dateDemarrage = '".$projet->getDateDemarrage()."', cout = '".$projet->getCout()."', maitriseOeuvre = '".$projet->getMaitriseOeuvre()."', financement = '".$projet->getFinancement()."', coucheSI = '".$projet->getCoucheSI()."', perspectives = '".$projet->getPerspectives()."'  where id = '".$projet->getId()."'";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Projet insertion failed!";
		}
	}

	function delete(Projet $projet)
	{
		$queryString = "delete from Projet where id='".$projet->getId()."'";
		$result = $this->connection->query($queryString);
		if (!$result)
		{
			echo "Projet deletion failed!";
		}
	}

	function getByCode($code)
	{
		$projet = NULL;

		$queryString = "select id, code, intitule, objet, description, duree, dateDemarrage, cout, maitriseOeuvre, financement, coucheSI, perspectives, che_id from Projet where code = '".$code."' ";
		$result = $this->connection->query($queryString);

		if (!$result)
			echo "Reading failed!";
		else
		{
			if ($result->num_rows < 1)
				return NULL;
			else
			{
				$i = 0;
				while ($row = $result->fetch_array(MYSQLI_NUM)){

					if ($i == 1)
						break;

					$projet = new Projet();
					$projet->setId($row[0]);
					$projet->setCode($row[1]);
					$projet->setIntitule($row[2]);
					$projet->setObjet($row[3]);
					$projet->setDescription($row[4]);
					$projet->setDuree($row[5]);
					$projet->setDateDemarrage($row[6]);
					$projet->setCout($row[7]);
					$projet->setMaitriseOeuvre($row[8]);
					$projet->setFinancement($row[9]);
					$projet->setCoucheSI($row[10]);
					$projet->setPerspectives($row[11]);
					$projet->setChefProjet($this->chefProjetManager->getById($row[12]));

					$i++;
				}
			}
		}
		return $projet;
	}
}