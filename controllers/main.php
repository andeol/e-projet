<?php

require("ProjetController.php");
require(dirname(__DIR__)."/database/ManagerContainer.php");
require(dirname(__DIR__)."/tests/TestController.php");

class ControllerContainer
{
	private $projetController;

	function __construct($connection)
	{		
		$managerContainer = new ManagerContainer($connection);
		$this->projetController = new ProjetController($managerContainer);
		$this->TestController = new TestController($managerContainer);
	}

	function init()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST'){
			// Depending on the state of some variables, differents part of the code will be triggered
			$action = $_POST['action'];
			$this->$_POST['controller']->$action();
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
			// the request points to the projetController object
			if ($_GET['controller'] === 'ProjetController'){
				$action = $_GET['action'];
				
				$this->projetController->$action();
			}

			if($_GET['controller'] === 'TestController'){
				$this->TestController->init();
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