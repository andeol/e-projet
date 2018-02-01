<?php

require(dirname(__DIR__).'/vendor/Fpdf/fpdf.php');
require("ProjetController.php");
require(dirname(__DIR__)."/database/ManagerContainer.php");
require(dirname(__DIR__)."/tests/TestController.php");
require(dirname(__DIR__)."/config/Router.php");
require(dirname(__DIR__)."/config/library.php");

class ControllerContainer
{
	private $projetController;
	private $testController;
	private $router;

	function __construct($connection)
	{		
		$managerContainer = new ManagerContainer($connection);
		$this->projetController = new ProjetController($managerContainer);
		$this->testController = new TestController($managerContainer);
		$this->router = new Router();
	}

	function init()
	{
		$uri = $this->getCurrentUri();
		$action = $this->router->matches($uri);
		//echo $uri;

		if ($action != NULL){
			$controller = $action[0];
			$action = $action[1];
			$this->$controller->$action();
		}
		else
		{
			// The resource required doesn't exist and an error 404 page is displayed
			$this->showErrorView();
		}

		/*
		if ($_SERVER['REQUEST_METHOD'] === 'POST'){
			// Depending on the state of some variables, differents part of the code will be triggered
			$controller = $_POST['controller'];
			$action = $_POST['action'];
			$this->$controller->$action();
		}
		else if ($_SERVER['REQUEST_METHOD'] === 'GET'){
			//echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			//$this->handleGetRequest();
		}
		*/
	}

	function getCurrentUri()
    {
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
        if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
        $uri = '/' . trim($uri, '/');
        return $uri;
    }

    function showErrorView()
    {
    	include_once(dirname(__DIR__)."/views/ErrorView.php");
    	return;
    }
}