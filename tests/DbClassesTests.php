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
		//$this->testChefProjetManager();

		//$this->testProjetManager();

		//$this->testObjectifManager();

		//$this->testResultatManager();

		//$this->testRisqueManager();

		//$this->testActiviteManager();

		$this->testLogManager();
	}

	function testChefProjetManager()
	{
		//adding ChefProjet object
		$this->managerContainer->add(new ChefProjet(0,"Ayantome", "jislain", 1304));

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
		
		//adding Projet object
		$projet = new Projet();
		$projet->setId(0);
		$projet->setCode("code");
		$projet->setIntitule("intitulé");
		$projet->setObjet("Objet");
		$projet->setDescription("description");
		$projet->setCout(0);
		$projet->setFinancement("financement");
		$projet->setCoucheSI("coucheSI");
		$projet->setPerspectives("perspectives");
		$projet->setMaitriseOeuvre("maitrîse d'oeuvre");
		$projet->setDuree(0);
		$projet->setDateDemarrage("2018-01-01 00:00:00");

		$chefProjet = $this->managerContainer->chefProjetManager->getOneBy("Ayantome", "jislain");
		$projet->setChefProjet($chefProjet);

		$this->managerContainer->add($projet);
		
		
		//getting chefProjet following a certain criteria 
		$projet = $this->managerContainer->projetManager->getByCode("code");
		$projet->setIntitule("intitulé bis");

		//updating Projet object
		$this->managerContainer->update($projet);

		//deleting Projet object
		$this->managerContainer->delete($projet);
		
	}

	function testObjectifManager()
	{
		//adding ChefProjet object
		//$this->managerContainer->add(new Objectif(0, "objectif", $this->managerContainer->projetManager->getByCode("code")));

		
		//getting chefProjet following a certain criteria 
		//$objectifs = $this->managerContainer->objectifManager->getByProjet($this->managerContainer->projetManager->getByCode("code"));
		//$objectifs[0]->setLibelle("obj");

		//updating chefProjet object
		//$this->managerContainer->update($objectifs[0]);

		//deleting chefProject object
		$this->managerContainer->delete($objectifs[0]);
		
	}

	function testResultatManager()
	{
		//adding ChefProjet object
		$this->managerContainer->add(new Resultat(0, "resultat", "indicateurs", $this->managerContainer->projetManager->getByCode("code")));

		
		//getting chefProjet following a certain criteria 
		$resultats = $this->managerContainer->resultatManager->getByProjet($this->managerContainer->projetManager->getByCode("code"));
		$resultats[0]->setLibelle("obj");

		//updating chefProjet object
		$this->managerContainer->update($resultats[0]);

		//deleting chefProject object
		$this->managerContainer->delete($resultats[0]);
	}

	function testRisqueManager()
	{
		//adding ChefProjet object
		$this->managerContainer->add(new Risque(0, "risque", $this->managerContainer->projetManager->getByCode("code")));

		//getting chefProjet following a certain criteria 
		$risques = $this->managerContainer->risqueManager->getByProjet($this->managerContainer->projetManager->getByCode("code"));
		//echo  $risques[0]->getLibelle();
		$risques[0]->setLibelle("obj");

		//updating chefProjet object
		$this->managerContainer->update($risques[0]);

		//deleting chefProject object
		$this->managerContainer->delete($risques[0]);
	}

	function testActiviteManager()
	{
		//adding ChefProjet object
		$this->managerContainer->add(new Activite(0, "activité", "2018-01-01 00:00:00", 0, $this->managerContainer->projetManager->getByCode("code")));

		//getting chefProjet following a certain criteria 
		$activites = $this->managerContainer->activiteManager->getByProjet($this->managerContainer->projetManager->getByCode("code"));
		//$activites[0]->setLibelle("activ");

		//updating chefProjet object
		$this->managerContainer->update($activites[0]);

		//deleting chefProject object
		$this->managerContainer->delete($activites[0]);
	}

	function testLogManager()
	{
		//adding ChefProjet object
		//$this->managerContainer->add(new Log(0, "2018-01-01 00:00:00", "creation", $this->managerContainer->projetManager->getByCode("code")));

		//getting chefProjet following a certain criteria 
		$logs = $this->managerContainer->logManager->getByProjet($this->managerContainer->projetManager->getByCode("code"));
		$logs[0]->setAction("modif");

		//updating chefProjet object
		$this->managerContainer->update($logs[0]);

		//deleting chefProject object
		//s$this->managerContainer->delete($logs[0]);
	}	
}