<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ProjetController
{
	private $managerContainer;

	function __construct($managerContainer)
	{
		$this->managerContainer = $managerContainer;
	}

	function addProject()
	{
		$chefsProjet = $this->managerContainer->chefProjetManager->getAll();
		$sourcesFinancement = $this->managerContainer->sourceFinancementManager->getAll();
		$couchesSI = $this->managerContainer->coucheSIManager->getAll();
		$maitrisesOeuvre = $this->managerContainer->maitriseOeuvreManager->getAll();

		if ($_SERVER['REQUEST_METHOD'] === 'POST'){


			// Retrieving variables from posts parameters
			$intitule = htmlspecialchars($_POST['intitule']);
			$duree = htmlspecialchars($_POST['duree']);
			$maitriseOeuvre = new MaitriseOeuvre(0, htmlspecialchars($_POST['maitriseOeuvre']));
			$objet = htmlspecialchars($_POST['objet']);
			$dateDemarrage = htmlspecialchars($_POST['dateDemarrage']);
			$coucheSI = new CoucheSI(0, htmlspecialchars($_POST['coucheSI']));
			$cout = htmlspecialchars($_POST['cout']);
			$sourceFinancement = new SourceFinancement(0, htmlspecialchars($_POST['sourceFinancement']));
			$description = htmlspecialchars($_POST['description']);
			$perspectives = htmlspecialchars($_POST['perspectives']);
			$code = htmlspecialchars($_POST['prjcde']);
			$codeChefProjet = htmlspecialchars($_POST['codeChefProjet']);
			$dateFin = htmlspecialchars($_POST['dateFin']);

			$objectifs = explode(';', htmlspecialchars($_POST['objectifs']));	
			$resultats = explode(';', htmlspecialchars($_POST['resultats']));	
			$indicateurs = explode(';', htmlspecialchars($_POST['indicateurs']));
			$risques = explode(';', htmlspecialchars($_POST['risques']));

			$activite_libelles = explode(';', htmlspecialchars($_POST['activite_libelles']));	
			$activite_dates = explode(';', htmlspecialchars($_POST['activite_dates']));
			$activite_durees = explode(';', htmlspecialchars($_POST['activite_durees']));

			//echo "code : ".$code;

			$chefProjet = htmlspecialchars($_POST['chefProjet']);
			$chefProjet = explode(' ', $chefProjet);
			$chefProjet = $this->managerContainer->chefProjetManager->getOneBy($chefProjet[0], $chefProjet[1]);

			if ($codeChefProjet != $chefProjet->getCode()){
				$codeProjet = $code;

				for ($i = 0; $i < sizeof($activite_libelles); $i++){
					$activites[] = new Activite(0, $activite_libelles[$i], $activite_dates[$i], $activite_durees[$i], new Projet());
					//echo $activites[$i]->getLibelle().' '. $activites[$i]->getDateDebut().' '.$activites[$i]->getDuree().'\n';
				}	

				for ($i = 0; $i < sizeof($objectifs); $i++){
					$liste_objectifs[] = new Objectif(0, $objectifs[$i], new Projet());
					//echo $liste_objectifs[$i]->getLibelle()."/";
					$liste_resultats[] = new Resultat(0, $resultats[$i], $indicateurs[$i], new Projet());
					//echo $liste_resultats[$i]->getLibelle().':'.$liste_resultats[$i]->getIndicateurs().'/';
					$liste_risques[] = new Risque(0, $risques[$i], new Projet());
					//echo $liste_risques[$i]->getLibelle()."/";
				}	

				$message = "Code du chef Projet erroné ! ";
				include_once(dirname(__DIR__)."/views/AddProjectView.php");
				return;
			}

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
			$projet->setDateFin($dateFin);

			$projet->setMaitriseOeuvre($maitriseOeuvre);
			$projet->setSourceFinancement($sourceFinancement);
			$projet->setCoucheSI($coucheSI);

			// setting the status of a project
			if ($dateDemarrage == date("Y-m-d"))
				// projet en cours
				$projet->setEtat(PROJ_CAT_1); 
			else
				// projet nen attente (non encore initié)
				$projet->setEtat(PROJ_CAT_0);


			$projet = $this->managerContainer->add($projet);


			for ($i = 0; $i < sizeof($activite_libelles); $i++){
				$activites[] = new Activite(0, $activite_libelles[$i], $activite_dates[$i], $activite_durees[$i], $projet);
				//echo $activites[$i]->getLibelle().' '. $activites[$i]->getDateDebut().' '.$activites[$i]->getDuree().'\n';
			}	

			for ($i = 0; $i < sizeof($objectifs); $i++){
				$liste_objectifs[] = new Objectif(0, $objectifs[$i], $projet);
				//echo $liste_objectifs[$i]->getLibelle()."/";
				$liste_resultats[] = new Resultat(0, $resultats[$i], $indicateurs[$i], $projet);
				//echo $liste_resultats[$i]->getLibelle().':'.$liste_resultats[$i]->getIndicateurs().'/';
				$liste_risques[] = new Risque(0, $risques[$i], $projet);
				//echo $liste_risques[$i]->getLibelle()."/";
			}	

			$date = getdate();
			//$date = $date["year"].'-'.$date["mon"].'-'.$date["mday"].' '. $date["hours"].':'.$date["minutes"].':'.$date["seconds"];
			$date = $date["year"].'-'.$date["mon"].'-'.$date["mday"];
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

			if (isset($_GET['projectCode'])){
				$projectCode = $_GET['projectCode'];
			}
			else{
				// we ask the user to enter it
				$target = "updateProject";
				include_once(dirname(__DIR__)."/views/AskProjectCodeView.php");
				return;
			}

			$projet = $this->managerContainer->projetManager->getByCode($projectCode);
			if ($projet == NULL){
				echo "Wrong project code";
				return;
			}

		}
		else if ($_SERVER['REQUEST_METHOD'] === 'POST'){

			// Retrieving variables from posts parameters
			$projetId = htmlspecialchars($_POST['projetId']);
			$intitule = htmlspecialchars($_POST['intitule']);
			$duree = htmlspecialchars($_POST['duree']);
			$maitriseOeuvre = htmlspecialchars($_POST['maitriseOeuvre']);
			$objet = htmlspecialchars($_POST['objet']);
			$dateDemarrage = htmlspecialchars($_POST['dateDemarrage']);
			$coucheSI = htmlspecialchars($_POST['coucheSI']);
			$cout = htmlspecialchars($_POST['cout']);
			$sourceFinancement = htmlspecialchars($_POST['sourceFinancement']);
			$description = htmlspecialchars($_POST['description']);
			$perspectives = htmlspecialchars($_POST['perspectives']);
			$code = htmlspecialchars($_POST['prjcde']);

			$chefProjet = htmlspecialchars($_POST['chefProjet']);
			$chefProjet = explode(' ', $chefProjet);
			$chefProjet = $this->managerContainer->chefProjetManager->getOneBy($chefProjet[0], $chefProjet[1]);

			$projet = new Projet();

			$projet->setId($projetId);
			$projet->setCode($code);
			$projet->setIntitule($intitule);
			$projet->setObjet($objet);
			$projet->setDescription($description);
			$projet->setDuree($duree);
			$projet->setDateDemarrage($dateDemarrage);
			$projet->setCout($cout);
			$projet->setPerspectives($perspectives);
			$projet->setChefProjet($chefProjet);

			$projet->setMaitriseOeuvre($this->managerContainer->maitriseOeuvreManager->getByLibelle($maitriseOeuvre));
			$projet->setSourceFinancement($this->managerContainer->sourceFinancementManager->getByLibelle($sourceFinancement));
			$projet->setCoucheSI($this->managerContainer->coucheSIManager->getByLibelle($coucheSI));

			$this->managerContainer->update($projet);

			$activite_libelles = explode(';', htmlspecialchars($_POST['activite_libelles']));	
			$activite_dates = explode(';', htmlspecialchars($_POST['activite_dates']));
			$activite_durees = explode(';', htmlspecialchars($_POST['activite_durees']));

			for ($i = 0; $i < sizeof($activite_libelles); $i++){
				$activites[] = new Activite(0, $activite_libelles[$i], $activite_dates[$i], $activite_durees[$i], $projet);
				//echo $activites[$i]->getLibelle().' '. $activites[$i]->getDateDebut().' '.$activites[$i]->getDuree().'\n';
			}

			$objectifs = explode(';', htmlspecialchars($_POST['objectifs']));	
			$resultats = explode(';', htmlspecialchars($_POST['resultats']));	
			$indicateurs = explode(';', htmlspecialchars($_POST['indicateurs']));
			$risques = explode(';', htmlspecialchars($_POST['risques']));	

			for ($i = 0; $i < sizeof($objectifs); $i++){
				$liste_objectifs[] = new Objectif(0, $objectifs[$i], $projet);
				//echo $liste_objectifs[$i]->getLibelle()."/";
				$liste_resultats[] = new Resultat(0, $resultats[$i], $indicateurs[$i], $projet);
				//echo $liste_resultats[$i]->getLibelle().':'.$liste_resultats[$i]->getIndicateurs().'/';
				$liste_risques[] = new Risque(0, $risques[$i], $projet);
				//echo $liste_risques[$i]->getLibelle()."/";
			}	

			$date = getdate();
			$date = $date["year"].'-'.$date["mon"].'-'.$date["mday"];
			$log = new Log(0, $date, "modification", $projet);

			$this->managerContainer->deleteObjectifsByProjet($projet);
			$this->managerContainer->deleteResultatsByProjet($projet);
			$this->managerContainer->deleteRisquesByProjet($projet);
			$this->managerContainer->deleteActivitesByProjet($projet);
			
			// inserting project's tasks into the database
			for ($i = 0; $i < sizeof($activites); $i++){
				$this->managerContainer->add($activites[$i]);
			}

			// inserting project's goals into the database
			for ($i = 0 ; $i < sizeof($liste_objectifs) ; $i++){
				$this->managerContainer->add($liste_objectifs[$i]);
			}

			// inserting project's achievements into the database
			for ($i = 0 ; $i < sizeof($liste_resultats) ; $i++){
				$this->managerContainer->add($liste_resultats[$i]);
			}	

			// inserting project's risks into the database
			for ($i = 0 ; $i < sizeof($liste_risques) ; $i++){
				$this->managerContainer->add($liste_risques[$i]);
			}

			// and eventually, we take into account that update
			if ($this->managerContainer->logManager->add($log) != NULL)
				$message = "Projet modifié avec succès ! ";
			else
				$message = "Une erreur est survenue lors de la modification ! ";

			//include_once(dirname(__DIR__)."/views/UpdateProjectView.php");
		}

		// After getting the whole project object, we do the same with all the stuff like "objectifs", "resultats" etc.
		$objectifs = $this->managerContainer->getObjectifsByProjet($projet);
		$resultats = $this->managerContainer->getResultatsByProjet($projet);
		$risques = $this->managerContainer->getRisquesByProjet($projet);
		$activites = $this->managerContainer->getActivitesByProjet($projet);
		include_once(dirname(__DIR__)."/views/UpdateProjectView.php");
	}

	function searchProject()
	{
		
		if (isset($_GET['ajax'])){
			// Getting parameters sent
			$code = $_GET['searchProjCode'];
			$chefProjet = $_GET['searchChefProjet'];
			$sourceFinancement = $_GET['sourceFinancement'];
			$periodes = array($_GET['searchDebutPeriode'],$_GET['searchFinPeriode']);
			$costs = array($_GET['searchMinCost'], $_GET['searchMaxCost']);
			$status = $_GET['etatProjet'];

			if ($chefProjet != "none"){
				$chefProjet = explode(' ', $chefProjet);
				$chefProjet = $this->managerContainer->chefProjetManager->getOneBy($chefProjet[0], $chefProjet[1]);
			}

			// Searching the specified project
			// $response = $this->managerContainer->projetManager->getBy($code, $dateDemarrage, $chefProjet, "table");
			$response = $this->managerContainer->projetManager->getBy($code, $chefProjet, $sourceFinancement, $periodes, $costs, $status,"table");
			
			echo json_encode($response);
		}
		else{
			
			$sourcesFinancement = $this->managerContainer->sourceFinancementManager->getAll();
			$chefsProjet = $this->managerContainer->chefProjetManager->getAll();
			$projets = $this->managerContainer->projetManager->getAll();
			include_once(dirname(__DIR__)."/views/SearchProjectView.php");
		}
	}

	function printPDF()
	{
		if (!isset($_GET['projectCode'])){
			// we ask the user to enter it
			$target = "printPDF";
			include_once(dirname(__DIR__)."/views/AskProjectCodeView.php");
			return;
		}

		$project = $this->managerContainer->projetManager->getByCode($_GET['projectCode']);
		if ($project == NULL){
			echo "Wrong project code";
			return;
		}

		// Retrieves the project id and gets the whole project object from it
		$pdf = new PDF('L');
		$pdf->setProject($project);
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);

		$pdf->Ln();
		$pdf->SetFillColor(154,205,50);
		$pdf->Cell(100, 10,  utf8_decode(' Intitulé : '.$project->getIntitule()),1,0,'L',true);
		$pdf->Cell(85, 10,  utf8_decode(' Durée : '.$project->getDuree().' jours'),1,0,'L',true);
		$pdf->Cell(85, 10,  utf8_decode(' Maîtrise d\'oeuvre : '.$project->getMaitriseOeuvre()->getLibelle()),1,0,'L',true);
		$pdf->Ln();
		$pdf->Cell(100, 10,  utf8_decode(' Objet : '.$project->getObjet()), 1, 0, 'L', true);
		$pdf->Cell(85, 10,  utf8_decode(' Date de démarrage : '.getDateFrFormat($project->getDateDemarrage())),1,0,'L',true);
		$pdf->Cell(85, 10,  utf8_decode(' Couche du SI : '.$project->getCoucheSI()->getLibelle()),1,0,'L',true);
		$pdf->Ln();
		$pdf->Cell(100, 10,  utf8_decode(' Chef Projet : '.$project->getChefProjet()->getNom()." ".$project->getChefProjet()->getPrenoms()),1,0,'L',true);
		$pdf->Cell(85, 10,  utf8_decode(' Coût prévisionnel : '.$project->getCout()),1,0,'L',true);
		$pdf->Cell(85, 10,  utf8_decode(' Source de Financement : '.$project->getSourceFinancement()->getLibelle()),1,0,'L',true);
		$pdf->Ln();
		//$pdf->Rect(20,20,40,40,'Description: '.$project->getDescription()),0,0);
		$pdf->Cell(270, 10,  utf8_decode(' Description : '.$project->getDescription()),1,1,'L');
		$detailsTableHeaders = array("Objectifs du projet",  utf8_decode("Résultats"), "Indicateurs", "Contraintes");
		$pdf->printDetailsTable($detailsTableHeaders, $this->loadDetailsTableData($project));
		
		
		$pdf->cell(270, 10, 'Planning Provisionnel',1,1,'L');
		
		$tasksTableHeaders = array( utf8_decode("Activités"),  utf8_decode("Date de début"),  utf8_decode("Durée(jour)"));
		$pdf->printTasksTable($tasksTableHeaders, $this->loadTasksTableData($project));
		
		$pdf->Cell(270, 10, utf8_decode(' Perspsectives : '.$project->getPerspectives()), 1,1,'L');

		$pdf->Output();	
	}

	function loadDetailsTableData($projet)
	{
		$record = array();
		$objectifs = $this->managerContainer->getObjectifsByProjet($projet);
		$resultats = $this->managerContainer->getResultatsByProjet($projet);
		$risques = $this->managerContainer->getRisquesByProjet($projet);

		for($i = 0; $i < sizeof($objectifs); $i++){
			$record[] = array(utf8_decode($objectifs[$i]->getLibelle()), utf8_decode($resultats[$i]->getLibelle()), utf8_decode($resultats[$i]->getIndicateurs()), utf8_decode($risques[$i]->getLibelle()));
		}
		return $record;
	}

	function loadTasksTableData($projet)
	{
		$record = array();
		$activites = $this->managerContainer->getActivitesByProjet($projet);
		for($i = 0; $i < sizeof($activites); $i++){
			$record[] = array(utf8_decode($activites[$i]->getLibelle()), utf8_decode(getDateFrFormat($activites[$i]->getDateDebut())), utf8_decode($activites[$i]->getDuree()));
		}
		return $record;
	}

	function purgeDb()
	{
		$this->managerContainer->purgeDb();
	}

	function checkCPCode()
	{
		// turning get requests into variables
		$chefProjetCode = $_GET['chefProjetCode'];
		$projetId = $_GET['projetId'];

		$projet = $this->managerContainer->projetManager->getById($projetId);
		if ($chefProjetCode == $projet->getChefProjet()->getCode())
			echo 1;
		else
			echo 0;
	}

	/**
	*	Generates a xlsx file readable by Microsoft Excel Software and its pairs
	*/

	function printExcel()
	{

		$project = $this->managerContainer->projetManager->getById($_GET['idProject']);
		if ($project == NULL){
			//echo "Wrong project ID";
			return;
		}
		
		$spreadsheet = new Spreadsheet();

		
		// Setting spreadsheet properties
		$spreadsheet->getProperties()->setCreator('ASSI')
		->setLastModifiedBy('Your Name')
		->setTitle('First excel file')
		->setSubject('Excel test document')
		->setDescription('Generating the excel file using phpspreadsheet library.')
		->setKeywords('php excel file IO');
		$spreadsheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(40);
		$spreadsheet->getDefaultStyle()->getFont()->setSize(12);
		$spreadsheet->getActiveSheet()->getRowDimension('1')->setRowHeight(50);
		$spreadsheet->getActiveSheet()->getStyle('B1')
    ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

		$sheet = $spreadsheet->getActiveSheet();

		$spreadsheet->getActiveSheet()->getStyle('A8:D8')->getFill()
		    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		    ->getStartColor()->setARGB('00FEFF01');

		 $spreadsheet->getActiveSheet()->getStyle('A3:D5')->getFill()
		    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		    ->getStartColor()->setARGB('0074D73E');

		//Merging cells
		$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
		$drawing->setName('Logo');
		$drawing->setDescription('Logo');
		$drawing->setPath(dirname(__DIR__)."/resources/images/logo_assi.png");
		$drawing->setHeight(60);
		$drawing->setWorksheet($spreadsheet->getActiveSheet());
		$drawing->setCoordinates('A1');
		$drawing->setOffsetX(110);
		//$drawing->setRotation(25);
		//$drawing->getShadow()->setVisible(true);
		//$drawing->getShadow()->setDirection(45);

		$sheet->mergeCells('B1:D1');
		$sheet->setCellValue('B1', "Fiche Projet ". $project->getCode());
		$sheet->mergeCells('A2:D2');
		$sheet->mergeCells('A3:B3');
		$sheet->setCellValue('A3', 'Intitulé : '.$project->getIntitule());
		$sheet->setCellValue('C3', 'Durée : '.$project->getDuree());
		$sheet->setCellValue('D3', 'Maitrise d\'oeuvre : '.$project->getMaitriseOeuvre()->getLibelle());
		$sheet->mergeCells('A4:B4');
		$sheet->setCellValue('A4', 'Objet : '.$project->getObjet());
		//$spreadsheet->getActiveSheet()->getStyle('C4')
		//    ->getNumberFormat()
		//    ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
		$sheet->setCellValue('C4', 'Date de démarrage : '.getDateFrFormat($project->getDateDemarrage()));
		$sheet->setCellValue('D4', 'Couche du SI : '.$project->getCoucheSI()->getLibelle());
		$sheet->mergeCells('A5:B5');
		$sheet->setCellValue('A5', 'Chef Projet : '.$project->getChefProjet()->getNom()." ".$project->getChefProjet()->getPrenoms());
		$sheet->setCellValue('C5', 'Coût prévisionnel : '.$project->getCout());
		$sheet->setCellValue('D5', 'Source de Finacement : '.$project->getSourceFinancement()->getLibelle());
		$sheet->mergeCells('A6:D6');
		$sheet->setCellValue('A6', 'Description : '.$project->getDescription());
		$sheet->mergeCells('A7:D7');
		$sheet->setCellValue('A8', 'Les objectifs du projet');
		$sheet->setCellValue('B8', 'Les résultats du projet');
		$sheet->setCellValue('C8', 'Les indicateurs du projet');
		$sheet->setCellValue('D8', 'Les contraintes et risques du projet');

		$objectifs = $this->managerContainer->getObjectifsByProjet($project);
		$resultats = $this->managerContainer->getResultatsByProjet($project);
		$risques = $this->managerContainer->getRisquesByProjet($project);
		$activites = $this->managerContainer->getActivitesByProjet($project);

		$i = 9;
		for ($j = 0; $j < sizeof($objectifs); $j++) {
			$sheet->setCellValue('A'.$i, $objectifs[$j]->getLibelle());
			$sheet->setCellValue('B'.$i, $resultats[$j]->getLibelle());
			$sheet->setCellValue('C'.$i, $resultats[$j]->getIndicateurs());
			$sheet->setCellValue('D'.$i, $risques[$j]->getLibelle());
			$i++;
		}

		$sheet->mergeCells('A'.$i.':D'.$i);

		$i++;
		$sheet->mergeCells('A'.$i.':D'.$i);
		$spreadsheet->getActiveSheet()->getStyle('A'.$i.':D'.$i)->getFill()
		    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		    ->getStartColor()->setARGB('002980B9');
		$sheet->setCellValue('A'.$i, 'Planning prévisionnel');
		$i++;
		$sheet->mergeCells('A'.$i.':B'.$i);
		$sheet->setCellValue('A'.$i, 'Activités');
		$sheet->setCellValue('C'.$i, 'Début de début');
		$sheet->setCellValue('D'.$i, 'Durée (Jour)');
		$i++;

		for ($j = 0; $j < sizeof($activites); $j++){
			$sheet->mergeCells('A'.$i.':B'.$i);
			$sheet->setCellValue('A'.$i, $activites[$j]->getLibelle());
			//$spreadsheet->getActiveSheet()->getStyle('C'.$i)
			//    ->getNumberFormat()
			//    ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
			$sheet->setCellValue('C'.$i, getDateFrFormat($activites[$j]->getDateDebut()));
			$sheet->setCellValue('D'.$i, $activites[$j]->getDuree());
			$i++;
		}
		
		$sheet->mergeCells('A'.$i.':D'.$i);
		$sheet->setCellValue('A'.$i, 'Perspectives : '.$project->getPerspectives());
		
		/*
		header('Content-Type: application/vnd.ms-excel; charset=UTF-8;');
		header('Content-Disposition: attachment;filename="01-simple.xls"');
		header('Cache-Control: max-age=0');
		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
		$writer->save('php://output');
		*/		

		$writer = new Xlsx($spreadsheet);
		$writer->save('Fiche_Projet.xlsx');
	}

	function printDoneProjects()
	{
		// Retrieves the project id and gets the whole project object from it
		$pdf = new ProjectsPDF('P');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',12);

		$pdf->Cell(100, 10,  '',0,2);

		$pdf->cell(100, 10, 'Liste des projets finis',0,2);
		
		$projectsTableHeaders = array( utf8_decode("Code"),  utf8_decode("Intitulé"),  utf8_decode("Description"),  utf8_decode("Durée (jour)") ,  utf8_decode("Date de démarrage"));
		
		
		$doneProjects = $this->managerContainer->projetManager->getDoneProjects();
		
		$data = array();
		$size = sizeof($doneProjects);
		//echo $size;
		for ($i = 0; $i < $size; $i++) {
			$project = $doneProjects[$i];
			$data[] = array(utf8_decode($project->getCode()), utf8_decode($project->getIntitule()), utf8_decode($project->getDescription()), utf8_decode($project->getDuree()), utf8_decode($project->getDateDemarrage()));
		}

		$pdf->displayProjectsTable($projectsTableHeaders, $data);
		
		$pdf->Cell(100, 10, '',0,2);
		$pdf->Ln();

		$pdf->Output();	
	}

	function printLateProjects()
	{
		// Retrieves the project id and gets the whole project object from it
		$pdf = new ProjectsPDF('P');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',12);

		$pdf->Cell(100, 10,  '',0,2);

		$pdf->cell(100, 10, 'Liste des projets en retard',0,2);
		
		$projectsTableHeaders = array( utf8_decode("Code"),  utf8_decode("Intitulé"),  utf8_decode("Description"),  utf8_decode("Durée (jour)") ,  utf8_decode("Date de démarrage"));
		
		$lateProjects = $this->managerContainer->projetManager->getLateProjects();
		
		$data = array();
		$size = sizeof($lateProjects);
		//echo $size;
		for ($i = 0; $i < $size; $i++) {
			$project = $lateProjects[$i];
			$data[] = array(utf8_decode($project->getCode()), utf8_decode($project->getIntitule()), utf8_decode($project->getDescription()), utf8_decode($project->getDuree()), utf8_decode($project->getDateDemarrage()));
		}

		$pdf->displayProjectsTable($projectsTableHeaders, $data);
		
		$pdf->Cell(100, 10, '',0,2);
		$pdf->Ln();

		$pdf->Output();	
	}

	function printAllProjects()
	{
		// Retrieves the project id and gets the whole project object from it
		$pdf = new ProjectsPDF('P');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',12);

		$pdf->Cell(100, 10,  '',0,2);

		$pdf->cell(100, 10, 'Liste des projets',0,2);
		
		$projectsTableHeaders = array( utf8_decode("Code"),  utf8_decode("Intitulé"),  utf8_decode("Description"),  utf8_decode("Durée (jour)") ,  utf8_decode("Date de démarrage"));
		
		$lateProjects = $this->managerContainer->projetManager->getLateProjects();
		
		$data = array();
		$size = sizeof($lateProjects);
		//echo $size;
		for ($i = 0; $i < $size; $i++) {
			$project = $lateProjects[$i];
			$data[] = array(utf8_decode($project->getCode()), utf8_decode($project->getIntitule()), utf8_decode($project->getDescription()), utf8_decode($project->getDuree()), utf8_decode($project->getDateDemarrage()));
		}

		$pdf->displayProjectsTable($projectsTableHeaders, $data);
		
		$pdf->Cell(100, 10, '',0,2);
		$pdf->Ln();

		$pdf->Output();	
	}

	function printProjetsByChefProjet()
	{
		$idChefProjet = $_GET['idChefProjet'];
		$chefProjet = $this->managerContainer->chefProjetManager->getById($idChefProjet);
		if ($chefProjet == NULL){
			echo "Chef Projet not found";
			return;
		}

		$pdf = new ProjectsPDF('P');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',12);

		$pdf->Ln();
		$pdf->SetFillColor(255,255,255);
		$pdf->Cell(100, 10,  utf8_decode(' Nom : '.$chefProjet->getNom()),0,0,'L',true);
		$pdf->Cell(100, 10,  utf8_decode(' Prénoms : '.$chefProjet->getPrenoms()),0,0,'L',true);

		$pdf->cell(100, 10, '',0,2);
		$pdf->Ln();
		$pdf->cell(100, 10, 'Liste des projets',0,2);
		
		$projectsTableHeaders = array( utf8_decode("Code"),  utf8_decode("Intitulé"),  utf8_decode("Description"),  utf8_decode("Durée (jour)") ,  utf8_decode("Date de démarrage"));
		
		$projects = $this->managerContainer->projetManager->getByChefProjet($chefProjet);
		
		$data = array();
		$size = sizeof($projects);
		//echo $size;
		for ($i = 0; $i < $size; $i++) {
			$project = $projects[$i];
			$data[] = array($project->getCode(), $project->getIntitule(), $project->getDescription(), $project->getDuree(), $project->getDateDemarrage());
		}
		$pdf->displayProjectsTable($projectsTableHeaders, $data);
		
		$pdf->Cell(100, 10, '',0,2);
		$pdf->Ln();

		$pdf->Output();	
	}

	/**
	* @brief 
	* @param 
	* @return
	*/
	function printSearchStats()
	{
		$ids = $_GET["projectIds"];
		$ids = explode(';', $ids);

		$pdf = new PDF_Diag();
		$pdf->AddPage();
		
		$data = array();
		foreach ($ids as $id) {
			$project = $this->managerContainer->projetManager->getById($id);
			$data[utf8_decode($project->getCode())] = utf8_decode($project->getTauxExecution()); 
		}
		//print_r($data);

		
		//Pie chart		
		$pdf->SetFont('Arial', 'BIU', 12);
		$pdf->Cell(0, 5, '1 - Diagramme circulaire des projets', 0, 1);
		$pdf->Ln(8);

		$pdf->SetFont('Arial', '', 10);
		$valX = $pdf->GetX();
		$valY = $pdf->GetY();
		/*
		foreach($data as $key=>$value){
			$pdf->Ln();
			$pdf->Cell(30, 5, 'Pourcentage '.$key.':');
			$pdf->Cell(15, 5, $data[$key], 0, 0, 'R');
		}
		*/
		$pdf->Ln();
		$pdf->Ln(8);

		$pdf->SetXY(50, $valY);
		$col1=array(100,100,255);
		$col2=array(255,100,100);
		$col3=array(255,255,100);
		$pdf->PieChart(100, 35, $data, '%l (%p)', array($col1,$col2,$col3));
		$pdf->SetXY($valX, $valY + 40);
		

		//Bar diagram
		$pdf->SetFont('Arial', 'BIU', 12);
		$pdf->Cell(0, 5, utf8_decode('Diagramme en bâton des projets'), 0, 1);
		$pdf->Ln(8);
		$valX = $pdf->GetX();
		$valY = $pdf->GetY();
		$pdf->BarDiagram(200, 70, $data, '%l : %v (%p)', array(255,175,100));
		$pdf->SetXY($valX, $valY + 80);

		$pdf->Output();
	}

	function endProject()
	{
		// Getting parameters sent
		$projectId = $_GET['projectId'];
		$response = $this->managerContainer->projetManager->endProject($projectId);
		echo json_encode($response);
	}

	function printStatsSubMenu1()
	{
		$projects = $this->managerContainer->projetManager->getAll();

		$pdf = new PDF_Diag();
		$pdf->AddPage();
		
		$data = array();
		foreach ($projects as $project) {
			$data[utf8_decode($project->getCode())] = utf8_decode($project->getTauxExecution()); 
		}		

		//Bar diagram
		$pdf->Ln();
		$pdf->SetFont('Arial', 'BIU', 12);
		$pdf->Cell(0, 5, utf8_decode('Diagramme en bâton de tous les projets (suivant le taux d\'exécution)'), 0, 1);
		$pdf->Ln(8);
		$valX = $pdf->GetX();
		$valY = $pdf->GetY();
		$pdf->BarDiagram(200, 70, $data, '%l : %v (%p)', array(255,175,100));
		$pdf->SetXY($valX, $valY + 80);

		$pdf->Output();
	}

	function printStatsSubMenu2()
	{
		$projects = $this->managerContainer->projetManager->getAll();		

		$pdf = new PDF_Diag();
		$pdf->AddPage();
		
		$data = array(utf8_decode(PROJ_CAT_0) => 0, utf8_decode(PROJ_CAT_1) => 0, utf8_decode(PROJ_CAT_2) => 0);
		foreach ($projects as $project) {

			switch ($project->getEtat()) {
				case PROJ_CAT_0:
					$data[PROJ_CAT_0]++;
					break;

				case PROJ_CAT_1:
					$data[PROJ_CAT_1]++;
					break;

				case PROJ_CAT_2:
					$data[PROJ_CAT_2]++;
					break;
				
				default:
					# code...
					break;
			} 
		}
		//print_r($data);

		
		//Pie chart		
		$pdf->Ln();
		$pdf->SetFont('Arial', 'BIU', 12);
		$pdf->Cell(0, 5, utf8_decode('Diagramme circulaire de tous les projets (suivant leur état)'), 0, 1);
		$pdf->Ln(8);

		$pdf->SetFont('Arial', '', 10);
		$valX = $pdf->GetX();
		$valY = $pdf->GetY();
	
		foreach($data as $key=>$value){
			$pdf->Ln();
			$pdf->Cell(30, 5, 'Pourcentage '.$key.':');
			$pdf->Cell(15, 5, $data[$key], 0, 0, 'R');
		}
		
		$pdf->Ln();
		$pdf->Ln(8);

		$pdf->SetXY(70, $valY);
		$col1=array(100,100,255);
		$col2=array(255,100,100);
		$col3=array(255,255,100);
		$pdf->PieChart(100, 35, $data, '%l (%p)', array($col1,$col2,$col3));
		$pdf->SetXY($valX, $valY + 40);

		$pdf->Output();
	}

	function printStatsSubMenu3()
	{
		$lateProjects = $this->managerContainer->projetManager->getLateProjects();
		$currentProjects = $this->managerContainer->projetManager->getCurrentProjects();
		$cat1 = "En cours";
		$cat2 = "En retard";		

		$pdf = new PDF_Diag();
		$pdf->AddPage();
		
		$data = array(utf8_decode($cat1) => sizeof($currentProjects), utf8_decode($cat2) => sizeof($lateProjects));
		//print_r($data);

		
		//Pie chart		
		$pdf->Ln();
		$pdf->SetFont('Arial', 'BIU', 12);
		$pdf->Cell(0, 5, utf8_decode('Diagramme circulaire de tous les projets (en cours ou en retard)'), 0, 1);
		$pdf->Ln(8);

		$pdf->SetFont('Arial', '', 10);
		$valX = $pdf->GetX();
		$valY = $pdf->GetY();
	
		foreach($data as $key=>$value){
			$pdf->Ln();
			$pdf->Cell(30, 5, 'Pourcentage '.$key.':');
			$pdf->Cell(15, 5, $data[$key], 0, 0, 'R');
		}
		
		$pdf->Ln();
		$pdf->Ln(8);

		$pdf->SetXY(70, $valY);
		$col1=array(100,100,255);
		$col2=array(255,100,100);
		$col3=array(255,255,100);
		$pdf->PieChart(100, 35, $data, '%l (%p)', array($col1,$col2,$col3));
		$pdf->SetXY($valX, $valY + 40);

		$pdf->Output();
	}
}

?>