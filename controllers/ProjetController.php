<?php

//require("");

class ProjetController
{
	private $managerContainer;

	function __construct($managerContainer)
	{
		$this->managerContainer = $managerContainer;
	}

	function showAddProjectForm()
	{
		include_once(dirname(__DIR__)."/views/AddProjectView.php");
		return;
	}

	function addProject()
	{
		// Turning the request's parameters into variables for the objects' properties
		
	}

	function updateProject()
	{
		
	}
}

?>