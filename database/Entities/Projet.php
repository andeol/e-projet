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

	private $financement;

	private $maitriseOeuvre;

	private $chefProjet;

	// Functions

	// Builder
	function __construct(){

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
		return $this->inititule;
	}

	function getObjet()
	{
		$this->objet;
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

	function getFinancement()
	{
		return $this->financement;
	}

	function getMaitriseOeuvre()
	{
		return $this->maitreOeuvre;
	}

	function getChefProjet()
	{
		return $this->chefProjet;
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

	function setCoucheSI()
	{
		$this->coucheSI = $coucheSI;
	}

	function setFinancement($financement)
	{
		$this->financement = $financement;
	}

	function setMaitriseOeuvre($maitreOeuvre)
	{
		$this->maitreOeuvre = $maitreOeuvre;
	}

	function setChefProjet(ChefProjet $chefProjet)
	{
		$this->chefProjet = $chefProjet;
	}
}

