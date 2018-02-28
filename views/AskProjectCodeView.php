<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>e-Projet</title>

		<!-- CSS Scripts -->
		<link href="http://<?= ROOT_DIR ?>vendor/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="http://<?= ROOT_DIR ?>resources/css/ProjetViewStyle.css" />

	</head>
	<body style = "background-color: #eee;">

	<form id ="projectCodeForm" method = "GET" action = 'http://<?= ROOT_DIR.$target ?>'>
		<input id = "projectCodeInput" name = "projectCode" hidden>
	</form>		

	<script src="http://<?php echo ROOT_DIR ?>vendor/JQuery/jquery.js"></script>
	<script src="http://<?php echo ROOT_DIR ?>vendor/Bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="http://<?php echo ROOT_DIR ?>vendor/Bootstrap/js/bootstrap.min.js"></script>

	<!-- JS Scripts -->
	<script type = "text/javascript">
		var projectCode = prompt("Entrer le code du projet: ");
		$('#projectCodeInput').val(projectCode);
		$('#projectCodeForm').submit();
	</script>

	</body>
</html>