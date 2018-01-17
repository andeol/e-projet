<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>e-Projet</title>

		<!-- CSS Scripts -->
		<link href="http://<?= ROOT_DIR ?>resources/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="http://<?= ROOT_DIR ?>resources/css/ProjetViewStyle.css" />

	</head>
	<body style = "background-color: #eee;">
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
					<select id = "searchProjCode" name = "searchProjCode" class="form-control">
				      		<?php foreach ($projets as $projet) { ?>
				      			<option value = "<?= $projet->getCode() ?>"> <?= $projet->getCode() ?></option>
				      		<?php }?>
				    </select>
				</div>

				<div class = "col">
					<label for="" style = "font-size:.6em;"> Chef projet </label>
					<select id = "searchChefProjet" name = "searchChefProjet" class="form-control">
				      		<?php foreach ($chefsProjet as $chefProjet) { ?>
				      			<option value = "<?= $chefProjet->getNom().' '.$chefProjet->getPrenoms() ?>"> <?= $chefProjet->getNom().' '.$chefProjet->getPrenoms() ?></option>
				      		<?php }?>
				    </select>
				</div>
				<div class = "col">
					<label for="" style = "font-size:.6em;"> Date de démarrage </label>
					<input id = "searchDateDemarrage" type = "date" name = "searchDateDemarrage" class = "form-control" >
				</div>
			</div>

			<div class = "row mt-3 ml-1">
				<button id = "searchProjectButton" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#searchProjectModal">Rechercher</button>
			</div>

			<h3 class = "font-weight-light mt-5"> Résultats <h3>
			<hr/>
			<table class="table table-striped" style = "font-size:0.6em;  background-color: white;">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Code</th>
			      <th scope="col">Intitulé</th>
			      <th scope="col">Objet</th>
			      <th scope="col">Description</th>
			      <th scope="col">Durée</th>
			    </tr>
			  </thead>
			  <tbody id = "correspProjectsTableBody">
			    
			  </tbody>
			</table>

			<nav aria-label="Page navigation example" style = "font-size:0.6em;">
			  <ul class="pagination justify-content-center">
			    <li class="page-item">
			      <a class="page-link" href="#" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			        <span class="sr-only">Previous</span>
			      </a>
			    </li>
			    <li class="page-item"><a class="page-link" href="#">1</a></li>
			    <li class="page-item"><a class="page-link" href="#">2</a></li>
			    <li class="page-item"><a class="page-link" href="#">3</a></li>
			    <li class="page-item">
			      <a class="page-link" href="#" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			        <span class="sr-only">Next</span>
			      </a>
			    </li>
			  </ul>
			</nav>

		</div>

	<!-- JS Scripts -->
	<script type = "text/javascript">

		var parameters = {
			ROOT_DIR: '<?= ROOT_DIR ?>'
		};

	</script>

	<script src="http://<?php echo ROOT_DIR ?>resources/js/jquery.js"></script>
	<script src="http://<?php echo ROOT_DIR ?>resources/Bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="http://<?php echo ROOT_DIR ?>resources/Bootstrap/js/bootstrap.min.js"></script>
	<script src="http://<?php echo ROOT_DIR ?>resources/js/projectFormJS.js"></script>
	</body>
</html>