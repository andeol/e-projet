<?php

require("ProjetController.php");
require(dirname(__DIR__)."/database/ManagerContainer.php");

class ControllerContainer
{
	private $projetController;

	function __construct($connection)
	{		
		$managerContainer = new ManagerContainer($connection);
		$this->projetController = new ProjetController($managerContainer);
	}

	function init()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST'){

		}
		else if ($_SERVER['REQUEST_METHOD'] === 'GET'){
			$this->handleGetRequest();
		}
	}

	function handleGetRequest()
	{
		if (!isset($_GET['controller']))
			$this->projetController->showAddProjectForm();
		else{
			$action = $_GET['action'];
			// the request points to the projetController object
			if ($_GET['controller'] === 'ProjetController'){
				$this->projetController->$action();
			}
		}
	}

	function handlePostRequest()
	{
		$action = $_POST['action'];
		// the request points to the projetController object
		if ($_POST['controller'] === 'ProjetController'){
			$this->projetController->$action();
		}
	}
}