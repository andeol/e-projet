<?php

//require("");

class ProjetController
{
	private $managerContainer;

	function __construct($managerContainer)
	{
		$this->managerContainer = $managerContainer;
	}

	function addProject()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST'){

			// Retrieving variables from posts parameters
			$intitule = $_POST['intitule'];
			$duree = $_POST['duree'];
			$maitriseOeuvre = $_POST['maitriseOeuvre'];
			$objet = $_POST['objet'];
			$dateDemarrage = $_POST['dateDemarrage'];
			$coucheSI = $_POST['coucheSI'];
			$cout = $_POST['cout'];
			$sourceFinancement = $_POST['sourceFinancement'];
			$description = $_POST['description'];
			$perspectives = $_POST['perspectives'];
			$code = $_POST['prjCode'];

			$chefProjet = $_POST['chefProjet'];
			$chefProjet = explode(' ', $chefProjet);
			$chefProjet = $this->managerContainer->chefProjetManager->getOneBy($chefProjet[0], $chefProjet[1]);

			$projet = new Projet();

			$projet->setId(0);
			$projet->setCode($code);
			$projet->setIntitule($intitule);
			$projet->setObjet($objet);
			$projet->setDescription($description);
			$projet->setDuree($duree);
			$projet->setDateDemarrage($dateDemarrage);
			$projet->setCout($cout);
			$projet->setPerspectives($perspectives);
			$projet->setChefProjet($chefProjet);

			$projet->setMaitriseOeuvre(new MaitriseOeuvre(0, $maitriseOeuvre));
			$projet->setSourceFinancement(new SourceFinancement(0, $sourceFinancement));
			$projet->setCoucheSI(new CoucheSI(0, $coucheSI));

			$projet = $this->managerContainer->add($projet);

			$activite_libelles = explode(';', $_POST['activite_libelles']);	
			$activite_dates = explode(';', $_POST['activite_dates']);
			$activite_durees = explode(';', $_POST['activite_durees']);

			for ($i = 0; $i < sizeof($activite_libelles); $i++){
				$activites[] = new Activite(0, $activite_libelles[$i], $activite_dates[$i], $activite_durees[$i], $projet);
				//echo $activites[$i]->getLibelle().' '. $activites[$i]->getDateDebut().' '.$activites[$i]->getDuree().'\n';
			}

			$objectifs = explode(';', $_POST['objectifs']);	
			$resultats = explode(';', $_POST['resultats']);	
			$indicateurs = explode(';', $_POST['indicateurs']);
			$risques = explode(';', $_POST['risques']);	

			for ($i = 0; $i < sizeof($objectifs); $i++){
				$liste_objectifs[] = new Objectif(0, $objectifs[$i], $projet);
				//echo $liste_objectifs[$i]->getLibelle()."/";
				$liste_resultats[] = new Resultat(0, $resultats[$i], $indicateurs[$i], $projet);
				//echo $liste_resultats[$i]->getLibelle().':'.$liste_resultats[$i]->getIndicateurs().'/';
				$liste_risques[] = new Risque(0, $risques[$i], $projet);
				//echo $liste_risques[$i]->getLibelle()."/";
			}	

			$date = getdate();
			$date = $date["year"].'-'.$date["mon"].'-'.$date["mday"].' '. $date["hours"].':'.$date["minutes"].':'.$date["seconds"];
			$log = new Log(0, $date, "creation", $projet);

			for ($i = 0; $i < sizeof($activites); $i++){
				$this->managerContainer->add($activites[$i]);
			}

			for ($i = 0 ; $i < sizeof($liste_objectifs) ; $i++){
				$this->managerContainer->add($liste_objectifs[$i]);
			}

			for ($i = 0 ; $i < sizeof($liste_resultats) ; $i++){
				$this->managerContainer->add($liste_resultats[$i]);
			}	

			for ($i = 0 ; $i < sizeof($liste_risques) ; $i++){
				$this->managerContainer->add($liste_risques[$i]);
			}

			if ($this->managerContainer->logManager->add($log) != NULL)
				$message = "Projet enregistré avec succès ! ";
			else
				$message = "Une erreur est survenue lors de l'enregistrement ! ";
			
		}

		$chefsProjet = $this->managerContainer->chefProjetManager->getAll();
		$sourcesFinancement = $this->managerContainer->sourceFinancementManager->getAll();
		$couchesSI = $this->managerContainer->coucheSIManager->getAll();
		$maitrisesOeuvre = $this->managerContainer->maitriseOeuvreManager->getAll();
		$codeProjet = $this->managerContainer->projetManager->getNextCode();

		include_once(dirname(__DIR__)."/views/AddProjectView.php");
		
	}

	function updateProject()
	{
		// i retrieve the id of thr project to be updated and from it, get the whole project object
		$chefsProjet = $this->managerContainer->chefProjetManager->getAll();
		$sourcesFinancement = $this->managerContainer->sourceFinancementManager->getAll();
		$couchesSI = $this->managerContainer->coucheSIManager->getAll();
		$maitrisesOeuvre = $this->managerContainer->maitriseOeuvreManager->getAll();

		if ($_SERVER['REQUEST_METHOD'] === 'GET'){

			$projectId = $_GET['projectId'];

			$projet = $this->managerContainer->projetManager->getById($projectId);
			//echo $projet->getDescription();

			// After getting the whole project object, we do the same with all the stuff like "objectifs", "resultats" etc.
			$objectifs = $this->managerContainer->getObjectifsByProjet($projet);
			$resultats = $this->managerContainer->getResultatsByProjet($projet);
			$risques = $this->managerContainer->getRisquesByProjet($projet);
			$activites = $this->managerContainer->getActivitesByProjet($projet);

			/*
			$projets = $this->managerContainer->projetManager->getAll();
			*/
		}
		else if ($_SERVER['REQUEST_METHOD'] === 'POST'){

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
		include_once(dirname(__DIR__)."/views/UpdateProjectView.php");
	}

	/*
	function getRightDateFormat($value)
	{
		$value = explode("/", $value);
		return $value[2].'-'.$value[1].'-'.$value[0];
	}
	*/

	function searchProject()
	{
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
		{    
			// Getting parameters sent
			$code = $_GET['searchProjCode'];
			$chefProjet = $_GET['searchChefProjet'];
			$dateDemarrage = $_GET['searchDateDemarrage'];

			$chefProjet = explode(' ', $chefProjet);
			$chefProjet = $this->managerContainer->chefProjetManager->getOneBy($chefProjet[0], $chefProjet[1]);

			// Searching the specified project
			$response = $this->managerContainer->projetManager->getBy($code, $dateDemarrage, $chefProjet, "table");

			echo json_encode($response);
		}
		else{

			$chefsProjet = $this->managerContainer->chefProjetManager->getAll();
			$projets = $this->managerContainer->projetManager->getAll();
			include_once(dirname(__DIR__)."/views/SearchProjectView.php");
			
		}
	}
}

?>