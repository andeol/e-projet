<?php

class Resultat{

	// Properties

	private $id;

	private $libelle;

	private $indicateurs

	private $projet;

	// Functions

	// Default Builder
	function Resultat(){

	}

	function Resultat($libelle, $indicateurs, $projet){
		$this->id = 0;
		$this->libelle = $libelle;
		$this->indicateurs = $indicateurs;
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

	function getIndicateurs()
	{
		return $this->indicateurs;
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

	function setIndicateurs($indicateurs)
	{
		$this->indicateurs = $indicateurs;
	}
}

?>