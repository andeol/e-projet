<?php

/**
*
*
*/

class Router
{
	//  Properties
	private $routes = ["/" => "projetController/addProject",
		"/updateProject" => "projetController/updateProject",
		"/addProject" => "projetController/addProject",
		"/searchProject" => "projetController/searchProject",
		"/purgeDb" => "projetController/purgeDb",
		"/checkCPCode" => "projetController/checkCPCode",
		"/printPDF" => "projetController/printPDF",
		"/printExcel" => "projetController/printExcel",
		"/printDoneProjects" => "projetController/printDoneProjects",
		"/printLateProjects" => "projetController/printLateProjects",
		"/printAllProjects" => "projetController/printAllProjects",
		"/projetsByChefProjet" => "projetController/printProjetsByChefProjet",
		"/tests" => "testController/init"];

	// Functions
	function __construct()
	{
		// Initializing the routes of the project

	}

	function matches($uri)
	{
		foreach ($this->routes as $key => $action) {

			if ($key == $uri){
				$action = explode('/', $action);
				return $action;
			}
		}
		return NULL;
	}
}

