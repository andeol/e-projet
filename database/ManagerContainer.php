<?php

//namespace eProjet::Database::EntityManagers;

require("EntityManagers/EntityManager.php");
require("EntityManagers/ActiviteManager.php");
require("EntityManagers/ChefProjetManager.php");
require("EntityManagers/LogManager.php");
require("EntityManagers/ResultatManager.php");
require("EntityManagers/ObjectifManager.php");
require("EntityManagers/ProjetManager.php");
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

	// Functions
	function __construct($connection)
	{
		$this->activiteManager = new ActiviteManager($connection);
		$this->chefProjetManager = new ChefProjetManager($connection);
		$this->resultatManager = new ResultatManager($connection);
		$this->objectifManager = new ObjectifManager($connection);
		$this->logManager = new LogManager($connection);
		$this->risqueManager = new RisqueManager($connection);
		$this->projetManager = new ProjetManager($connection);
	}

	/**
	*
	*/

	function add($object)
	{
		//Depending on the object's type the object is added to the database

		// object variable is an Activite instance
		if ($object instanceof Activite){
			$this->activiteManager->add($object);
		}

		// object variable is Project instance
		if ($object instanceof Projet){
			$this->projetManager->add($object);
		}

		// object variable is Log instance
		if ($object instanceof Log){
			$this->logManager->add($object);
		}

		// object variable is Resultat instance
		if ($object instanceof Resultat){
			$this->resultatManager->add($object);
		}

		// object variable is Risque instance
		if ($object instanceof Log){
			$this->risqueManager->add($object);
		}

		// object variable is Objectif instance
		if ($object instanceof Log){
			$this->objectifManager->add($object);
		}

		// object variable is an ChefProjet instance
		if ($object instanceof ChefProjet){
			$this->chefProjetManager->add($object);
		}
	}

	function update($object)
	{
		//Depending on the object's type the object is updated to the database

		// object variable is an Activite instance
		if ($object instanceof Activite){
			$this->activiteManager->update($object);
		}

		// object variable is Project instance
		if ($object instanceof Projet){
			$this->projetManager->update($object);
		}

		// object variable is Log instance
		if ($object instanceof Log){
			$this->logManager->update($object);
		}

		// object variable is Resultat instance
		if ($object instanceof Resultat){
			$this->resultatManager->update($object);
		}

		// object variable is Risque instance
		if ($object instanceof Log){
			$this->risqueManager->update($object);
		}

		// object variable is Objectif instance
		if ($object instanceof Log){
			$this->objectifManager->update($object);
		}

		// object variable is an ChefProjet instance
		if ($object instanceof ChefProjet){
			$this->chefProjetManager->update($object);
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
		if ($object instanceof Log){
			$this->risqueManager->delete($object);
		}

		// object variable is Objectif instance
		if ($object instanceof Log){
			$this->objectifManager->delete($object);
		}

		// object variable is an ChefProjet instance
		if ($object instanceof ChefProjet){
			$this->chefProjetManager->delete($object);
		}
	}
}

