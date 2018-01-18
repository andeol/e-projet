<?php

class Projet{

	// Properties

	private $id;

	private $code;

	private $intitule;

	private $objet;

	private $description;

	private $dateDemarrage;

	private $duree;

	private $perspectives;

	private $cout;

	private $coucheSI;

	private $sourceFinancement;

	private $maitriseOeuvre;

	private $chefProjet;

	private $tauxExecution;

	private $etat;

	private $dateFin;

	// Functions

	// Builder
	function __construct(){
		$this->id = 0;
		$this->code = "";
		$this->intitule = "";
		$this->objet = "";
		$this->description = "";
		$this->dateDemarrage = "";
		$this->duree = "";
		$this->perspectives = "";
		$this->cout = 0;
		$this->coucheSI = "";
		$this->sourceFinancement = "";
		$this->maitriseOeuvre = "";
		$this->chefProjet = "";
		$this->tauxExecution = 0;
		$this->etat = 0;
		$this->dateFin = "";
	}

	// Getters
	function getId(){
		return $this->id;
	}

	function getCode(){
		return $this->code;
	}

	function getIntitule()
	{
		return $this->intitule;
	}

	function getObjet()
	{
		return $this->objet;
	}

	function getDescription()
	{
		return $this->description;
	}

	function getDateDemarrage()
	{
		return $this->dateDemarrage;
	}

	function getDuree()
	{
		return $this->duree;
	}

	function getPerspectives()
	{
		return $this->perspectives;
	}

	function getCout()
	{
		return $this->cout;
	}

	function getCoucheSI()
	{
		return $this->coucheSI;
	}

	function getSourceFinancement()
	{
		return $this->sourceFinancement;
	}

	function getMaitriseOeuvre()
	{
		return $this->maitriseOeuvre;
	}

	function getChefProjet()
	{
		return $this->chefProjet;
	}

	function getTauxExecution()
	{
		return $this->tauxExecution;
	}

	function getDateFin()
	{
		return $this->dateFin;
	}

	function getEtat()
	{
		return $this->etat;
	}


	// Setters
	function setId($id)
	{
		$this->id = $id;
	}

	function setCode($code)
	{
		$this->code = $code;
	}

	function setIntitule($intitule)
	{
		$this->intitule = $intitule;
	}

	function setObjet($objet)
	{
		$this->objet = $objet;
	}

	function setDescription($description)
	{
		$this->description = $description;
	}

	function setDateDemarrage($dateDemarrage)
	{
		$this->dateDemarrage = $dateDemarrage;
	}

	function setDuree($duree)
	{
		$this->duree = $duree;
	}

	function setPerspectives($perspectives)
	{
		$this->perspectives = $perspectives;
	}

	function setCout($cout)
	{
		$this->cout = $cout;
	}

	function setCoucheSI(CoucheSI $coucheSI)
	{
		$this->coucheSI = $coucheSI;
	}

	function setSourceFinancement(SourceFinancement $sourceFinancement)
	{
		$this->sourceFinancement = $sourceFinancement;
	}

	function setMaitriseOeuvre(MaitriseOeuvre $maitriseOeuvre)
	{
		$this->maitriseOeuvre = $maitriseOeuvre;
	}

	function setChefProjet(ChefProjet $chefProjet)
	{
		$this->chefProjet = $chefProjet;
	}

	function setTauxExecution($tauxExecution)
	{
		$this->tauxExecution = $tauxExecution;
	}

	function setEtat($etat)
	{
		$this->etat = $etat;
	}

	function setDateFin($dateFin)
	{
		$this->dateFin = $dateFin;
	}
}

