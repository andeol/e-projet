<?php

//require("");

class DbClassesTestController
{
	private $managerContainer;

	function __construct($managerContainer)
	{
		$this->managerContainer = $managerContainer;
	}

	function init()
	{	
		$this->testChefProjetManager();
	}

	function testChefProjetManager()
	{
		//adding ChefProjet object
		//$this->managerContainer->add(new ChefProjet("Ayantome", "jislain", 1304));

		//getting chefProjet following a certain criteria 
		$chefProjet = $this->managerContainer->chefProjetManager->getOneBy("Ayantome", "jislain");
		$chefProjet->setCode(1302);

		//updating chefProjet object
		$this->managerContainer->update($chefProjet);

		//deleting chefProject object
		$this->managerContainer->delete($chefProjet);
	}

	function testProjetManager()
	{
		
	}
}