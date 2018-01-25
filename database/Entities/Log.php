<?php

class Log{

	// Properties

	private $id;

	private $date;

	private $action;

	private $projet;

	// Functions

	// Builder
	function __construct($id, $date, $action, $projet){
		$this->id = $id;
		$this->date = $date;
		$this->action = $action;
		$this->projet = $projet;
	}

	// Getters
	function getId(){
		return $this->id;
	}

	function getDate(){
		return $this->date;
	}

	function getAction()
	{
		return $this->action;
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

	function setDate($date)
	{
		$this->date = $date;
	}

	function setAction($action)
	{
		$this->action = $action;
	}

	function setProjet($projet)
	{
		$this->projet = $projet;
	}
}

