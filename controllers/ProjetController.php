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

		if ($_SERVER['REQUEST_METHOD'] === 'POST'){


			// Retrieving variables from posts parameters
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
			$codeChefProjet = htmlspecialchars($_POST['codeChefProjet']);
			$dateFin = htmlspecialchars($_POST['dateFin']);

			//echo "code : ".$code;

			$chefProjet = htmlspecialchars($_POST['chefProjet']);
			$chefProjet = explode(' ', $chefProjet);
			$chefProjet = $this->managerContainer->chefProjetManager->getOneBy($chefProjet[0], $chefProjet[1]);

			if ($codeChefProjet != $chefProjet->getCode()){
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

			$projet->setMaitriseOeuvre(new MaitriseOeuvre(0, $maitriseOeuvre));
			$projet->setSourceFinancement(new SourceFinancement(0, $sourceFinancement));
			$projet->setCoucheSI(new CoucheSI(0, $coucheSI));

			$projet = $this->managerContainer->add($projet);

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

			if ($projet == NULL){
				echo "Wrong project id";
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
		if ($projet == NULL){
			$objectifs = $this->managerContainer->getObjectifsByProjet($projet);
			$resultats = $this->managerContainer->getResultatsByProjet($projet);
			$risques = $this->managerContainer->getRisquesByProjet($projet);
			$activites = $this->managerContainer->getActivitesByProjet($projet);
		}
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

			if ($chefProjet != "none"){
				$chefProjet = explode(' ', $chefProjet);
				$chefProjet = $this->managerContainer->chefProjetManager->getOneBy($chefProjet[0], $chefProjet[1]);
			}

			// Searching the specified project
			// $response = $this->managerContainer->projetManager->getBy($code, $dateDemarrage, $chefProjet, "table");
			$response = $this->managerContainer->projetManager->getBy($code, $chefProjet, $sourceFinancement, $periodes, $costs, "table");
			
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
		$project = $this->managerContainer->projetManager->getById($_GET['idProject']);
		if ($project == NULL){
			echo "Wrong project ID";
			return;
		}

		// Retrieves the project id and gets the whole project object from it
		$pdf = new PDF('L');
		$pdf->setProject($project);
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);

		$pdf->Ln();
		$pdf->SetFillColor(0,255,0);
		$pdf->Cell(100, 10,  utf8_decode(' Intitulé : '.$project->getIntitule()),0,0,'L',true);
		$pdf->Cell(100, 10,  utf8_decode(' Durée : '.$project->getDuree().' jours'),0,0,'L',true);
		$pdf->Cell(85, 10,  utf8_decode(' Maîtrise d\'oeuvre : '.$project->getMaitriseOeuvre()->getLibelle()),0,0,'L',true);
		$pdf->Ln();
		$pdf->Cell(100, 10,  utf8_decode(' Objet : '.$project->getObjet()), 0, 0, 'L', true);
		$pdf->Cell(100, 10,  utf8_decode(' Date de démarrage : '.getDateFrFormat($project->getDateDemarrage())),0,0,'L',true);
		$pdf->Cell(85, 10,  utf8_decode(' Couche du SI : '.$project->getCoucheSI()->getLibelle()),0,0,'L',true);
		$pdf->Ln();
		$pdf->Cell(100, 10,  utf8_decode(' Chef Projet : '.$project->getChefProjet()->getNom()." ".$project->getChefProjet()->getPrenoms()),0,0,'L',true);
		$pdf->Cell(100, 10,  utf8_decode(' Coût prévisionnel : '.$project->getCout()),0,0,'L',true);
		$pdf->Cell(85, 10,  utf8_decode(' Source de Financement : '.$project->getSourceFinancement()->getLibelle()),0,0,'L',true);
		$pdf->Ln();
		$pdf->Cell(100, 10,  utf8_decode(' Description : '.$project->getDescription()),0,0);
		$pdf->Ln();
		$pdf->Cell(100, 10,  '',0,2);
		$detailsTableHeaders = array("Objectifs",  utf8_decode("Résultats"), "Indicateurs", "Contraintes");
		$pdf->printDetailsTable($detailsTableHeaders, $this->loadDetailsTableData($project));
		$pdf->Ln();
		$pdf->Cell(100, 10,  '',0,2);
		$pdf->cell(100, 10, 'Planning Provisionnel',0,2);
		
		$tasksTableHeaders = array( utf8_decode("Activités"),  utf8_decode("Date de début"),  utf8_decode("Durée(jour)"));
		$pdf->printTasksTable($tasksTableHeaders, $this->loadTasksTableData($project));
		
		$pdf->Cell(100, 10,  '',0,2);
		$pdf->Ln();

		$pdf->Cell(100, 10, utf8_decode(' Perspsectives : '.$project->getPerspectives()), 0, 0);

		$pdf->Output();	
	}

	function loadDetailsTableData($projet)
	{
		$record = array();
		$objectifs = $this->managerContainer->getObjectifsByProjet($projet);
		$resultats = $this->managerContainer->getResultatsByProjet($projet);
		$risques = $this->managerContainer->getRisquesByProjet($projet);

		for($i = 0; $i < sizeof($objectifs); $i++){
			$record[] = array($objectifs[$i]->getLibelle(), $resultats[$i]->getLibelle(), $resultats[$i]->getIndicateurs(), $risques[$i]->getLibelle());
		}
		return $record;
	}

	function loadTasksTableData($projet)
	{
		$record = array();
		$activites = $this->managerContainer->getActivitesByProjet($projet);
		for($i = 0; $i < sizeof($activites); $i++){
			$record[] = array($activites[$i]->getLibelle(), getDateFrFormat($activites[$i]->getDateDebut()), $activites[$i]->getDuree());
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
			$data[] = array($project->getCode(), $project->getIntitule(), $project->getDescription(), $project->getDuree(), $project->getDateDemarrage());
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
			$data[] = array($project->getCode(), $project->getIntitule(), $project->getDescription(), $project->getDuree(), $project->getDateDemarrage());
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
			$data[] = array($project->getCode(), $project->getIntitule(), $project->getDescription(), $project->getDuree(), $project->getDateDemarrage());
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
}

?>