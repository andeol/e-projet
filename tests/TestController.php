<?php

require(dirname(__DIR__)."/tests/DbClassesTests.php");

class TestController
{
	private $managerContainer;
	private $dbClassesTestController;

	function __construct($managerContainer)
	{
		$this->managerContainer = $managerContainer;
		$this->dbClassesTestController = new DbClassesTestController($managerContainer);
	}

	function init()
	{
		//echo "ok";
		$this->dbClassesTestController->init();
	}
}
