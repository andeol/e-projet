<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>e-Projet</title>

		<!-- CSS Scripts -->
		<link href="http://<?php echo ROOT_DIR ?>/resources/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body style = "background-color: #eee;">
		<div class = "container">
			<div class = "row">
				<div class = "w-25 text-center">
					<img class = "img-fluid" style = "width: 200px; height:200px;" src="http://<?php echo ROOT_DIR ?>/resources/images/logo_assi.png"/>
				</div>
				<h2 class = "font-weight-light text-center w-75 mt-5">
					FICHE PROJET
				</h2>
			</div>

			<!-- Including the form -->
			<?php include_once(dirname(__DIR__)."/forms/ProjectForm.php"); ?>

		</div>

	<!-- JS Scripts -->
	<script src="http://<?php echo ROOT_DIR ?>/resources/js/jquery.js"></script>
	<script src="http://<?php echo ROOT_DIR ?>/resources/Bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="http://<?php echo ROOT_DIR ?>/resources/Bootstrap/js/bootstrap.min.js"></script>
	<script src="http://<?php echo ROOT_DIR ?>/resources/js/projectFormJS.js"></script>
	</body>
</html>