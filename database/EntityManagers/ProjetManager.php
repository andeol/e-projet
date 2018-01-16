<?php

require(dirname(__DIR__)."/Entities/Projet.php");

class ProjetManager extends EntityManager
{
	// Properties
	private $chefProjetManager;

	private $coucheSIManager;

	private $sourceFinancementManager;

	private $maitriseOeuvreManager;

	// Functions

	// Default Builder
	function __construct($con, ChefProjetManager $chefProjetManager, CoucheSIManager $coucheSIManager, SourceFinancementManager $sourceFinancementManager, MaitriseOeuvreManager $maitriseOeuvreManager)
	{
		$this->chefProjetManager = $chefProjetManager;
		$this->coucheSIManager = $coucheSIManager;
		$this->sourceFinancementManager = $sourceFinancementManager;
		$this->maitriseOeuvreManager = $maitriseOeuvreManager;
		$this->connection = $con;
	}

	// Adding an Projet object to the database
	function add(Projet $projet)
	{
		$coucheSI = $this->coucheSIManager->add($projet->getCoucheSI());
		$sourceFinancement = $this->sourceFinancementManager->add($projet->getSourceFinancement());
		$maitriseOeuvre = $this->maitriseOeuvreManager->add($projet->getMaitriseOeuvre());

		$queryString = "insert into Projet values(NULL, '".$projet->getChefProjet()->getId()."','".$projet->getCode()."', '".$this->connection->real_escape_string($projet->getIntitule())
			."', '".$this->connection->real_escape_string($projet->getObjet())
			."', '".$this->connection->real_escape_string($projet->getDescription())
			."', '".$projet->getDuree()."', '".$projet->getDateDemarrage()
			."', '".$projet->getCout()."', '".$maitriseOeuvre->getId()
			."', '".$sourceFinancement->getId()."', '".$coucheSI->getId()
			."', '".$this->connection->real_escape_string($projet->getPerspectives())
			."', '".$projet->getTauxExecution()."', '".$projet->getEtat()
			."', '".$projet->getDateFin()."' )";

		$result = $this->connection->query($queryString);

		if (!$result)
		{
			echo "Projet insertion failed! \n";
		}

		return $this->getByCode($projet->getCode());
	}

	function update(Projet $projet)
	{
		$queryString = "update Projet set che_id = '".$projet->getChefProjet()->getId()."', code = '".$projet->getCode()."', intitule = '".$this->connection->real_escape_string($projet->getIntitule())."', objet = '".$this->connection->real_escape_string($projet->getObjet())."', description = '".$this->connection->real_escape_string($projet->getDescription())."', duree = '".$projet->getDuree()."', dateDemarrage = '".$projet->getDateDemarrage()."', cout = '".$projet->getCout()."', mo_id = '".$projet->getMaitriseOeuvre()->getId()."', srcFin = '".$projet->getSourceFinancement()->getId()."', coucheSI = '".$projet->getCoucheSI()->getid()."', perspectives = '".$this->connection->real_escape_string($projet->getPerspectives())."', tauxExecution = '".$projet->getTauxExecution()."', etat = '".$projet->getEtat()."', dateFin = '".$projet->getDateFin()."'  where id = '".$projet->getId()."'";
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

		$queryString = "select id, code, intitule, objet, description, duree, dateDemarrage, cout, mo_id, srcFin_id, cSI_id, perspectives, Che_id, tauxExecution, etat, dateFin from Projet where code = '".$code."' ";
		//echo $queryString;

		$result = $this->connection->query($queryString);

		if (!$result)
			echo "Reading failed!";
		else
		{
			if ($result->num_rows >= 1)
			{
				if ($row = $result->fetch_array(MYSQLI_NUM)){

					$projet = new Projet();
					$projet->setId($row[0]);
					$projet->setCode($row[1]);
					$projet->setIntitule($row[2]);
					$projet->setObjet($row[3]);
					$projet->setDescription($row[4]);
					$projet->setDuree($row[5]);
					$projet->setDateDemarrage($row[6]);
					$projet->setCout($row[7]);
					$projet->setMaitriseOeuvre($this->maitriseOeuvreManager->getById($row[8]));
					$projet->setSourceFinancement($this->sourceFinancementManager->getById($row[9]));
					$projet->setCoucheSI($this->coucheSIManager->getById($row[10]));
					$projet->setPerspectives($row[11]);
					$projet->setChefProjet($this->chefProjetManager->getById($row[12]));
					$projet->setTauxExecution($row[13]);
					$projet->setEtat($row[14]);
					$projet->setDateFin($row[15]);
				}
			}
		}

		return $projet;
	}

	function getAll()
	{
		$projets = NULL;

		$queryString = "select id, code, intitule, objet, description, duree, dateDemarrage, cout, mo_id, srcFin_id, cSI_id, perspectives, che_id , tauxExecution, etat, dateFin from Projet";
		$result = $this->connection->query($queryString);

		if (!$result)
			echo "Reading failed!";
		else
		{
			if ($result->num_rows >= 1)
			{
				while ($row = $result->fetch_array(MYSQLI_NUM)){

					$projet = new Projet();
					$projet->setId($row[0]);
					$projet->setCode($row[1]);
					$projet->setIntitule($row[2]);
					$projet->setObjet($row[3]);
					$projet->setDescription($row[4]);
					$projet->setDuree($row[5]);
					$projet->setDateDemarrage($row[6]);
					$projet->setCout($row[7]);
					$projet->setMaitriseOeuvre($this->maitriseOeuvreManager->getById($row[8]));
					$projet->setSourceFinancement($this->sourceFinancementManager->getById($row[9]));
					$projet->setCoucheSI($this->coucheSIManager->getById($row[10]));
					$projet->setPerspectives($row[11]);
					$projet->setChefProjet($this->chefProjetManager->getById($row[12]));
					$projet->setTauxExecution($row[13]);
					$projet->setEtat($row[14]);
					$projet->setDateFin($row[15]);

					$projets[] = $projet;
				}
			}
		}
		return $projets;
	}

	function getNextCode(ChefProjet $chefProjet = NULL)
	{
		$nextCode = "PRJ-";
		if ($chefProjet == NULL)
			$queryString = "select count(*) from Projet";
		else
			$queryString = "select count(*) from Projet where che_id = '".$chefProjet->getId()."'";

		$result = $this->connection->query($queryString);

		if (!$result)
			echo "Reading failed!";
		else
		{
			if ($row = $result->fetch_array(MYSQLI_NUM)){
				$nextCode .= $row[0];
			}
		}
		return $nextCode;
	}

	function getBy($code, $dateDemarrage, $chefProjet, $format)
	{
		$projets = NULL;

		$queryString = "select id, code, intitule, objet, description, duree, dateDemarrage, cout, mo_id, srcFin_id, cSI_id, perspectives, che_id , tauxExecution, etat, dateFin from Projet where code = '".$code."' and date(dateDemarrage) = '".$dateDemarrage."' and che_id = '".$chefProjet->getId()."'";
		//echo $queryString;
		$result = $this->connection->query($queryString);

		if (!$result)
			echo "Reading failed!";
		else
		{
			if ($result->num_rows >= 1)
			{
				while ($row = $result->fetch_array(MYSQLI_NUM)){

					if ($format == "object"){
						$projet = new Projet();
						$projet->setId($row[0]);
						$projet->setCode($row[1]);
						$projet->setIntitule($row[2]);
						$projet->setObjet($row[3]);
						$projet->setDescription($row[4]);
						$projet->setDuree($row[5]);
						$projet->setDateDemarrage($row[6]);
						$projet->setCout($row[7]);
						$projet->setMaitriseOeuvre($this->maitriseOeuvreManager->getById($row[8]));
						$projet->setSourceFinancement($this->sourceFinancementManager->getById($row[9]));
						$projet->setCoucheSI($this->coucheSIManager->getById($row[10]));
						$projet->setPerspectives($row[11]);
						$projet->setChefProjet($this->chefProjetManager->getById($row[12]));
						$projet->setTauxExecution($row[13]);
						$projet->setEtat($row[14]);
						$projet->setDateFin($row[15]);
						$projets[] = $projet;
					}
					else{
						$projets[] = $row;
					}
				}
			}
		}
		return $projets;
	}
}