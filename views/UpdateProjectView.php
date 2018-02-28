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

		<?php include_once(dirname(__DIR__)."/views/headerMenu.php"); ?>
		
		<div class = "container">
			<div class = "row">
				<div class = "w-25 text-center">
					<img class = "img-fluid" style = "width: 200px; height:200px;" src="http://<?= ROOT_DIR ?>/resources/images/logo_assi.png"/>
				</div>
				<h2 class = "font-weight-light text-center w-75 mt-5">
					FICHE PROJET
				</h2>
			</div>

			<?php
				if (isset($message)){
					echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
				  	'.$message.'
				  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  	  <span aria-hidden="true">&times;</span>
				  	</button>
					</div>';
				}
			?>
			<!-- Including the form -->
			<?php include_once(dirname(__DIR__)."/forms/UpdateProjectForm.php"); ?>

		</div>

	<!-- JS Scripts -->
	<script type = "text/javascript">

		var parameters = {
			ROOT_DIR: '<?= ROOT_DIR ?>',
			PROJ_STATUS: <?= ((isset($projet)) ? "'".$projet->getEtat()."'" : 'None')?>
		};

	</script>

	<script src="http://<?php echo ROOT_DIR ?>vendor/JQuery/jquery.js"></script>
	<script src="http://<?php echo ROOT_DIR ?>vendor/Bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="http://<?php echo ROOT_DIR ?>vendor/Bootstrap/js/bootstrap.min.js"></script>
	<script src="http://<?php echo ROOT_DIR ?>resources/js/projectFormJS.js"></script>
	</body>
</html>