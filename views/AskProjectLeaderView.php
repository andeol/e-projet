<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>e-Projet</title>

		<!-- CSS Scripts -->
		<link href="http://<?= ROOT_DIR ?>vendor/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="http://<?= ROOT_DIR ?>resources/css/ProjetViewStyle.css" />
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	</head>
	<body style = "background-color: #eee;">

		<div id="dialog" title="Basic dialog">
		  <p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
		</div>

		<form id ="projectIdForm" method = "GET" action = 'http://<?= ROOT_DIR.$target ?>'>
			<input id = "projectIdInput" name = "projectId" hidden>
		</form>		

		<script src="http://<?php echo ROOT_DIR ?>vendor/JQuery/jquery.js"></script>
		<script src="http://<?php echo ROOT_DIR ?>vendor/Bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="http://<?php echo ROOT_DIR ?>vendor/Bootstrap/js/bootstrap.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

		<!-- JS Scripts -->
		<script type = "text/javascript">
			  $( function() {
			    $( "#dialog" ).dialog();
			  } );
		</script>

	</body>
</html>