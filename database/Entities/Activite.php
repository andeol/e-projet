<?php

class Activite{

	// Properties

	private $id;

	private $libelle;

	private $dateDebut;

	private $duree;

	private $projet;

	// Functions

	// Builder
	function __construct($libelle, $dateDebut, $duree, $projet){
		$this->libelle = $libelle;
		$this->dateDebut = $dateDebut;
		$this->duree = $duree;
		$this->projet = $projet;
	}

	// Getters
	function getId(){
		return $this->id;
	}

	function getLibelle(){
		return $this->libelle;
	}

	function getDuree(){
		return $this->duree;
	}

	function getDateDebut()
	{
		return $this->dateDebut;
	}

	function getProjet()
	{
		return $this->projet;
	}

	// Setters
	function setId($id)
	{
		$this->id = $id;
	}

	function setLibelle($libelle)
	{
		$this->libelle = $libelle;
	}

	function setDateDebut($dateDebut)
	{
		$this->dateDebut = $dateDebut;
	}

	function setDuree($duree)
	{
		$this->duree = $duree;
	}

	function setProjet($projet)
	{
		$this->projet = $projet;
	}
}
