<?php

class ChefProjet{

	// Properties

	private $id;

	private $nom;

	private $prenoms;

	private $code;

	// Functions

	// Builder
	function __construct($nom, $prenoms, $code){
		$this->id = 0;
		$this->nom = $nom;
		$this->prenoms = $prenoms;
		$this->code = $code;
	}

	// Getters
	function getId(){
		return $this->id;
	}

	function getNom(){
		return $this->nom;
	}

	function getPrenoms()
	{
		return $this->prenoms;
	}

	function getCode()
	{
		return $this->code;
	}

	// Setters
	function setId($id)
	{
		$this->id = $id;
	}

	function setNom($nom)
	{
		$this->nom = $nom;
	}

	function setPrenoms($prenoms)
	{
		$this->prenoms = $prenoms;
	}

	function setCode($code)
	{
		$this->code = $code;
	}
}

