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

			<h3 class = "font-weight-light">Rechercher Projet <h3>
			<hr/>

			<div class = "row">

				<div class="col">
					<label for="" style = "font-size:.6em;"> Code du projet </label>
					<select id = "searchProjCode" class="form-control">
						<option value = "none" selected> Sélectionner code </option>
			      		<?php foreach ($projets as $projet) { ?>
			      			<option value = "<?= $projet->getCode() ?>"> <?= $projet->getCode() ?></option>
			      		<?php }?>
				    </select>
				</div>

				<div class = "col">
					<label for="" style = "font-size:.6em;"> Chef projet </label>
					<select id = "searchChefProjet" name = "searchChefProjet" class="form-control">
						<option value = "none" selected> Sélectionner chef projet </option>
			      		<?php foreach ($chefsProjet as $chefProjet) { ?>
			      			<option value = "<?= $chefProjet->getNom().' '.$chefProjet->getPrenoms() ?>"> <?= $chefProjet->getNom().' '.$chefProjet->getPrenoms() ?></option>
			      		<?php }?>
				    </select>
				</div>
			</div>

			<div class = "row">

			    <div class = "col">
					<label for="" style = "font-size:.6em;"> Début Période </label>
					<input id = "searchDebutPeriode" type = "date" class = "form-control" >
				</div>

				<div class = "col">
					<label for="" style = "font-size:.6em;"> Fin Période </label>
					<input id = "searchFinPeriode" type = "date" class = "form-control" >
				</div>
			</div>

			<div class = "row">

			    <div class = "col">
					<label for="" style = "font-size:.6em;"> Coût minimum </label>
					<input id = "searchMinCost" type = "number" value = 0 class = "form-control" >
				</div>

				<div class = "col">
					<label for="" style = "font-size:.6em;"> Coût maximum </label>
					<input id = "searchMaxCost" type = "number" value = 0 class = "form-control" >
				</div>
			</div>

			<div class = "row">
				<div class="col">
			    	<label for="" style = "font-size:.6em;">Source de financement</label>
			    	<div class = "input-group">
			      		<select id = "srcFinInput" name = "sourceFinancement" class="form-control"> 
			      			<option value = "none" selected> Sélectionner Source Financement </option>
				      		<?php foreach ($sourcesFinancement as $sourceFinancement) { ?>
				      			<option value = "<?= $sourceFinancement->getLibelle() ?>"> <?= $sourceFinancement->getLibelle() ?> </option>
				      		<?php }?>
				      	</select>
			      	</div>
			    </div>

			    <div class="col">
			    	<label for="" style = "font-size:.6em;">Etat</label>
			    	<div class = "input-group">
				    	<select id ="projEtatInput" name = "etatProjet" class="form-control">
				    		<option value = "none">Sélectionner l'état</option>
				    		<option value ="<?= PROJ_CAT_0 ?>"><?= PROJ_CAT_0 ?></option>
				    		<option value ="<?= PROJ_CAT_1 ?>"><?= PROJ_CAT_1 ?></option>
				    		<option value ="<?= PROJ_CAT_2 ?>"><?= PROJ_CAT_2 ?></option>
				    	</select>
				    </div>
			    </div>
			</div>

			<div class = "row mt-3 ml-1">
				<button id = "searchProjectButton" class="btn btn-primary btn-sm col-sm-2">Rechercher</button>
				<button id = "resetFieldsButton" class="btn btn-primary btn-sm offset-sm-8 col-sm-2">Reinitialiser</button>
			</div>

			<h3 class = "font-weight-light mt-5"> Résultats <a id = "statisticsButton" class="btn btn-outline-primary btn-sm disabled" href = "http://<?= ROOT_DIR ?>printSearchStats?projectIds=">Voir Statistiques</a></h3>
			<hr/>
			<table class="table table-striped" style = "background-color: white;">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Intitulé</th>
			      <th scope="col">Description</th>
			      <th scope="col">Durée</th>
			      <th scope="col">Date de démarrage</th>
			      <th scope="col">Actions</th>
			    </tr>
			  </thead>
			  <tbody id = "correspProjectsTableBody">
			    
			  </tbody>
			</table>

			<nav id = "projectsPageNav" aria-label="Page navigation example" style = "font-size:0.6em; visibility: hidden;" >
			  <ul id = "projectsPageNavContentHolder" class="pagination justify-content-center">
			  </ul>
			</nav>

		</div>

	<!-- JS Scripts -->
	<script type = "text/javascript">

		var parameters = {
			ROOT_DIR: '<?= ROOT_DIR ?>'
		};

	</script>

	<script src="http://<?php echo ROOT_DIR ?>vendor/JQuery/jquery.js"></script>
	<script src="http://<?php echo ROOT_DIR ?>vendor/Bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="http://<?php echo ROOT_DIR ?>vendor/Bootstrap/js/bootstrap.min.js"></script>
	<script src="http://<?php echo ROOT_DIR ?>resources/js/searchProject.js"></script>
	</body>
</html>