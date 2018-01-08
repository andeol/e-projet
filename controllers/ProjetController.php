<?php

//require("");

class ProjetController
{
	private $managerContainer;

	function __construct($managerContainer)
	{
		$this->managerContainer = $managerContainer;
	}

	function showAddProjectForm()
	{
		$chefsProjet = $this->managerContainer->chefProjetManager->getAll();

		include_once(dirname(__DIR__)."/views/AddProjectView.php");
		return;
	}

	function addProject()
	{
		// Retrieving variables from posts parameters
		$intitule = $_POST['intitule'];
		$duree = $_POST['duree'];
		$maitriseOeuvre = $_POST['maitriseOeuvre'];
		$objet = $_POST['objet'];
		$dateDemarrage = $_POST['dateDemarrage'];
		$coucheSI = $_POST['coucheSI'];
		$cout = $_POST['cout'];
		$financement = $_POST['financement'];
		$description = $_POST['description'];
		//$perspectives = $_POST['perspectives'];
		//$code = $_POST['code'];

		$chefProjet = $_POST['chefProjet'];
		$chefProjet = explode(' ', $chefProjet);
		$chefProjet = $this->managerContainer->chefProjetManager->getOneBy($chefProjet[0], $chefProjet[1]);

		$projet = new Projet();

		$activites_libelle = explode(';', $_POST['activite_libelle']);		
		$activites_date = explode(';', $_POST['activite_date']);
		$activites_duree = explode(';', $_POST['activite_duree']);

		for ($i = 0; $i < sizeof($activite_libelle); $i++){
			$this->managerContainer->activiteManager->add(new Activite(0, $activite_libelle[$i], $activite_date[$i], $activite_duree[$i], $projet));
		}

		$date = getdate();
		$date = $date["year"].'-'.$date["mon"].'-'.$date["mday"].' '. $date["hours"].':'.$date["minutes"].':'.$date["seconds"]
		$log = new Log(0, $date, "creation", $projet);
		$this->managerContainer->logManager->add($log);
	}

	function updateProject()
	{
		// Retrieving variables from posts parameters
		$intitule = $_POST['intitule'];
		$duree = $_POST['duree'];
		$maitriseOeuvre = $_POST['maitriseOeuvre'];
		$objet = $_POST['objet'];
		$dateDemarrage = $_POST['dateDemarrage'];
		$coucheSI = $_POST['coucheSI'];
		$cout = $_POST['cout'];
		$financement = $_POST['financement'];
		$description = $_POST['description'];
		//$perspectives = $_POST['perspectives'];
		//$code = $_POST['code'];

		$chefProjet = $_POST['chefProjet'];
		$chefProjet = explode(' ', $chefProjet);
		$chefProjet = $this->managerContainer->chefProjetManager->getOneBy($chefProjet[0], $chefProjet[1]);

		$projet = new Projet();

		$activites_libelle = explode(';', $_POST['activite_libelle']);		
		$activites_date = explode(';', $_POST['activite_date']);
		$activites_duree = explode(';', $_POST['activite_duree']);

		for ($i = 0; $i < sizeof($activite_libelle); $i++){
			$this->managerContainer->activiteManager->add(new Activite(0, $activite_libelle[$i], $activite_date[$i], $activite_duree[$i], $projet));
		}
	}
}

?>