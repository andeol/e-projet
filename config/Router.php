<?php

/**
*
*
*/

class Router
{
	//  Properties
	private $routes = ["/" => "projetController/showAddProjectForm",
		"/update" => "projetController/showUpdateProjectForm",
		"/tests" => "testController/init"];

	// Functions
	function __construct()
	{
		// Initializing the routes of the project

	}

	function matches(string $uri)
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

