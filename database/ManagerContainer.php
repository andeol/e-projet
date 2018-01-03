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
}

