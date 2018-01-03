<?php

require("./config/Parameters.inc.php");
require("./controllers/main.php");

// connection to the database
$con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB);

if (!$con){
	echo "Problem occured when connecting to the database";
}

// After the connection has been established


$controllerContainer = new controllerContainer($con);

$controllerContainer->init();

$con->close();

?>