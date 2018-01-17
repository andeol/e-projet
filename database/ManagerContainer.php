<?php

//namespace eProjet::Database::EntityManagers;

require("EntityManagers/EntityManager.php");
require("EntityManagers/ChefProjetManager.php");
require("EntityManagers/MaitriseOeuvreManager.php");
require("EntityManagers/SourceFinancementManager.php");
require("EntityManagers/CoucheSIManager.php");
require("EntityManagers/ProjetManager.php");
require("EntityManagers/ActiviteManager.php");
require("EntityManagers/LogManager.php");
require("EntityManagers/ResultatManager.php");
require("EntityManagers/ObjectifManager.php");
require("EntityManagers/RisqueManager.php");

class ManagerContainer
{
	// Properties
	// this hurts the principe of encapuslation but it's temporary
	public $activiteManager;

	public $chefProjetManager;

	public $risqueManager;

	public $logManager;

	public $projetManager;

	public $objectifManager;

	public $resultatManager;

	public $sourceFinancementManager;

	public $maitriseOeuvreManager;

	public $coucheSIManager;

	// Functions
	function __construct($connection)
	{
		$this->chefProjetManager = new ChefProjetManager($connection);
		$this->coucheSIManager = new CoucheSIManager($connection);
		$this->sourceFinancementManager = new SourceFinancementManager($connection);
		$this->maitriseOeuvreManager = new MaitriseOeuvreManager($connection);
		$this->projetManager = new ProjetManager($connection, $this->chefProjetManager, $this->coucheSIManager, $this->sourceFinancementManager, $this->maitriseOeuvreManager);
		$this->activiteManager = new ActiviteManager($connection);
		$this->resultatManager = new ResultatManager($connection);
		$this->objectifManager = new ObjectifManager($connection);
		$this->logManager = new LogManager($connection, $this->projetManager);
		$this->risqueManager = new RisqueManager($connection);
	}

	/**
	*
	*/

	function add($object)
	{
		//Depending on the object's type the object is added to the database

		// object variable is an Activite instance
		if ($object instanceof Activite){
			return $this->activiteManager->add($object);
		}

		// object variable is Project instance
		if ($object instanceof Projet){
			return $this->projetManager->add($object);
		}

		// object variable is Log instance
		if ($object instanceof Log){
			return $this->logManager->add($object);
		}

		// object variable is Resultat instance
		if ($object instanceof Resultat){
			return $this->resultatManager->add($object);
		}

		// object variable is Risque instance
		if ($object instanceof Risque){
			return $this->risqueManager->add($object);
		}

		// object variable is Objectif instance
		if ($object instanceof Objectif){
			return $this->objectifManager->add($object);
		}

		// object variable is an ChefProjet instance
		if ($object instanceof ChefProjet){
			return $this->chefProjetManager->add($object);
		}

		// object variable is an MaitriseOeuvre instance
		if ($object instanceof MaitriseOeuvre){
			return $this->maitriseOeuvreManager->add($object);
		}

		// object variable is an SourceFinancement instance
		if ($object instanceof SourceFinancement){
			return $this->SourceFinancementManager->add($object);
		}

		// object variable is an CoucheSI instance
		if ($object instanceof CoucheSI){
			return $this->coucheSIManager->add($object);
		}
	}

	function update($object)
	{
		//Depending on the object's type the object is updated to the database

		// object variable is an Activite instance
		if ($object instanceof Activite){
			return $this->activiteManager->update($object);
		}

		// object variable is Project instance
		if ($object instanceof Projet){
			return $this->projetManager->update($object);
		}

		// object variable is Log instance
		if ($object instanceof Log){
			return $this->logManager->update($object);
		}

		// object variable is Resultat instance
		if ($object instanceof Resultat){
			return $this->resultatManager->update($object);
		}

		// object variable is Risque instance
		if ($object instanceof Risque){
			return $this->risqueManager->update($object);
		}

		// object variable is Objectif instance
		if ($object instanceof Objectif){
			return $this->objectifManager->update($object);
		}

		// object variable is an ChefProjet instance
		if ($object instanceof ChefProjet){
			return $this->chefProjetManager->update($object);
		}

		// object variable is an MaitriseOeuvre instance
		if ($object instanceof MaitriseOeuvre){
			return $this->maitriseOeuvreManager->update($object);
		}

		// object variable is an SourceFinancement instance
		if ($object instanceof SourceFinancement){
			return $this->SourceFinancementManager->update($object);
		}

		// object variable is an CoucheSI instance
		if ($object instanceof CoucheSI){
			return $this->coucheSIManager->update($object);
		}
	}

	function delete($object)
	{
		//Depending on the object's type the object is added to the database

		// object variable is an Activite instance
		if ($object instanceof Activite){
			$this->activiteManager->delete($object);
		}

		// object variable is Project instance
		if ($object instanceof Projet){
			$this->projetManager->delete($object);
		}

		// object variable is Log instance
		if ($object instanceof Log){
			$this->logManager->delete($object);
		}

		// object variable is Resultat instance
		if ($object instanceof Resultat){
			$this->resultatManager->delete($object);
		}

		// object variable is Risque instance
		if ($object instanceof Risque){
			$this->risqueManager->delete($object);
		}

		// object variable is Objectif instance
		if ($object instanceof Objectif){
			$this->objectifManager->delete($object);
		}

		// object variable is an ChefProjet instance
		if ($object instanceof ChefProjet){
			$this->chefProjetManager->delete($object);
		}

		// object variable is an MaitriseOeuvre instance
		if ($object instanceof MaitriseOeuvre){
			$this->maitriseOeuvreManager->delete($object);
		}

		// object variable is an SourceFinancement instance
		if ($object instanceof SourceFinancement){
			$this->SourceFinancementManager->delete($object);
		}

		// object variable is an CoucheSI instance
		if ($object instanceof CoucheSI){
			$this->coucheSIManager->delete($object);
		}
	}

	function getResultatsByProjet(Projet $projet)
	{
		return $this->resultatManager->getByProjet($projet);
	}

	function getObjectifsByProjet(Projet $projet)
	{
		return $this->objectifManager->getByProjet($projet);
	}

	function getRisquesByProjet(Projet $projet)
	{
		return $this->risqueManager->getByProjet($projet);
	}

	function getActivitesByProjet($projet)
	{
		return $this->activiteManager->getByProjet($projet);
	}
}

