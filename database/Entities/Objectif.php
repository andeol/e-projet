<?php

class Objectif{

	// Properties

	private $id;

	private $libelle;

	private $projet;

	// Functions

	// Default Builder
	function Objectif(){

	}

	function Objectif($libelle, $projet){
		$this->id = 0;
		$this->libelle = $libelle;
		$this->projet = $projet;
	}

	// Getters
	function getId(){
		return $this->id;
	}

	function getLibelle(){
		return $this->libelle;
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

	function setProjet($projet)
	{
		$this->projet = $projet;
	}
}

?>