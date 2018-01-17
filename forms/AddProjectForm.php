<form class = "mt-3" method = "POST" action = 'http://<?= ROOT_DIR ?>addProject'>

	<h3 class = "font-weight-light">Infos projet<h3>
	<hr/>
	<div class="form-row">
		<div class = "col-md-4">
			<label for="" style = "font-size:.6em;"> Code du projet </label>
			<input id = "codeProjetInput" name = "prjCode" type="text" class="form-control" style = "background-color:white;" value = "<?= $codeProjet ?>" readonly required>
		</div>

		<div class="col-md-4">
	    	<label for="" style = "font-size:.6em;"> Intitulé</label>
	      	<input name = "intitule" type="text" class="form-control" placeholder="Intitulé" required>
	    </div>

	</div>
	<div class="form-row">
		<div class="col">
	    	<label for="" style = "font-size:.6em;">Objet</label>
	    	<input name = "objet" type="text" class="form-control" placeholder="Objet" required>
	    </div>
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Coût prévisionnel</label>
	      	<input id = "cout" name = "cout" type="text" value = '0' class="form-control" placeholder="Coût prévisionnel" required>
	    </div>
	     <div class="col">
	    	<label for="" style = "font-size:.6em;">Chef Projet</label>
	      	<select name = "chefProjet" class="form-control">
	      		<?php foreach ($chefsProjet as $chefProjet) { ?>
	      			<option value = "<?= $chefProjet->getNom().' '.$chefProjet->getPrenoms() ?>"> <?= $chefProjet->getNom().' '.$chefProjet->getPrenoms() ?></option>
	      		<?php }?>
	      	</select>
	    </div>
  	</div>

  	<div class="form-row mt-2">
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Date de démarrage</label>
	      	<input name = "dateDemarrage" type="date" class="form-control" placeholder="JJ/MM/AAAA" required>
	    </div>
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Durée</label>
	      	<input id = "duree" name = "duree" type="number" value = '0' class="form-control" placeholder="Nombre de jours" required>
	    </div>
	    <div class="col-md-4">
	    	<label for="" style = "font-size:.6em;"> Date de fin</label>
	      	<input name = "dateFin" type="date" class="form-control" style = "background-color:white;" placeholder="Date de fin" readonly>
	    </div>
  	</div>

  	<div class="form-row mt-2">
  		<div class="col">
	    	<label for="" style = "font-size:.6em;">Couche SI</label>
	    	<div class = "input-group">
		      	<select id = "coucheSiInput" name = "coucheSI" class="form-control"> 
		      		<?php foreach ($couchesSI as $coucheSI) { ?>
		      			<option value = "<?= $coucheSI->getLibelle() ?>"> <?= $coucheSI->getLibelle() ?> </option>
		      		<?php }?>
		      	</select>
		      	<a id = "addCoucheSIButton" class = "btn btn-secondary input-group-addon" data-toggle="modal" data-target="#addCoucheSIModal"><img class = "img-fluid" style = "width:17px;height:17px;" src = "http://<?= ROOT_DIR ?>/resources/images/glyphicons/glyphicons-191-plus-sign.png"/></a>
		    </div>
	    </div>
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Maîtrise d'Oeuvre</label>
	    	<div class = "input-group">
		      	<select id = "moInput" name = "maitriseOeuvre" class="form-control"> 
		      		<?php foreach ($maitrisesOeuvre as $maitriseOeuvre) { ?>
		      			<option value = "<?= $maitriseOeuvre->getLibelle() ?>"> <?= $maitriseOeuvre->getLibelle() ?> </option>
		      		<?php }?>
		      	</select>
		      	<a id = "addMaitriseOeuvreButton" class = "btn btn-secondary input-group-addon" data-toggle="modal" data-target="#addMaitriseOeuvreModal"><img class = "img-fluid" style = "width:17px;height:17px;" src = "http://<?= ROOT_DIR ?>/resources/images/glyphicons/glyphicons-191-plus-sign.png"/></a>
		    </div>
	    </div>
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Source de financement</label>
	    	<div class = "input-group">
	      		<select id = "srcFinInput" name = "sourceFinancement" class="form-control"> 
		      		<?php foreach ($sourcesFinancement as $sourceFinancement) { ?>
		      			<option value = "<?= $sourceFinancement->getLibelle() ?>"> <?= $sourceFinancement->getLibelle() ?> </option>
		      		<?php }?>
		      	</select>
	      		<a id ="addSrcFinButton" class = "btn btn-secondary input-group-addon" data-toggle="modal" data-target="#addSrcFinModal"><img class = "img-fluid" style = "width:17px;height:17px;" src = "http://<?= ROOT_DIR ?>/resources/images/glyphicons/glyphicons-191-plus-sign.png"/></a>
	      	</div>
	    </div>
  	</div>

  	<div class="form-row mt-2">
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Description</label>
		    <textarea name = "description" type="text" class="form-control" placeholder="Description" required></textarea>
	    </div>
  	</div>

  	<h3 class = "font-weight-light mt-5"> Infos supplémentaires <a id = "addDetailButton" class="btn btn-outline-primary btn-sm">Ajouter</a><h3>
	<hr/>

	<?php include_once("DetailTableProjectForm.php") ?>

  	<h3 class = "font-weight-light mt-5"> Planning prévisionnel <a id = "addActiviteButton" class="btn btn-outline-primary btn-sm">Ajouter</a><h3>
	<hr/>

	<?php include_once("ActiviteTableProjectForm.php") ?>

	<h3 class = "font-weight-light mt-5"> Perspectives <h3>
	<hr/>
	<div class="form-row mt-2 w-">
		<textarea name = "perspectives" type="text" class="form-control" placeholder="Perspectives" required></textarea>
  	</div>

	<div class="text-center">
  		<button id = "addProjectButton" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">Enregistrer</button>
  	</div>

  	<!-- Modals -->

  	<!-- Modal to confirm the record of the project into the database -->
	<div class="modal fade font-weight-light" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        Confirmez-vous l'enregistrement de ce projet?
	      </div>
	      <div class="modal-footer">
	        <button class="btn btn-success">Oui</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Modal to confirm the record of the project into the database -->
	<div class="modal fade font-weight-light" id="addCoucheSIModal" tabindex="-1" role="dialog" aria-labelledby="addCoucheSIModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="addCoucheSIModalLabel">Ajouter couche SI</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <div id = "cSIModalBody" class="modal-body">

			<div class = "">
				<label for="" style = "font-size:.6em;"> Libellé </label>
				<input id = "coucheSIModalLibelle" name = "code_projet" type="text" class="form-control">
			</div>
	      </div>
	      <div class="modal-footer">
	        <button id = "addCSIModalButton" class="btn btn-success">Ajouter</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Modal to confirm the record of the project into the database -->
	<div class="modal fade font-weight-light" id="addMaitriseOeuvreModal" tabindex="-1" role="dialog" aria-labelledby="addMaitriseOeuvreModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="addMaitriseOeuvreModalLabel">Ajouter Maitrise d'Oeuvre</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div id = "moModalBody" class="modal-body">
			<div class = "">
				<label for="" style = "font-size:.6em;"> Libellé </label>
				<input id = "moModalLibelle" name = "code_projet" type="text" class="form-control">
			</div>
	      </div>
	      <div class="modal-footer">
	        <button id = "addMoModalButton" class="btn btn-success">Ajouter</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Modal to confirm the record of the project into the database -->
	<div class="modal fade font-weight-light" id="addSrcFinModal" tabindex="-1" role="dialog" aria-labelledby="addSrcFinModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="addSrcFinModalLabel">Ajouter Source de Financement </h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div id = "srcFinModalBody" class="modal-body">
			<div class = "">
				<label for="" style = "font-size:.6em;"> Libellé </label>
				<input id = "srcFinModalLibelle" name = "code_projet" type="text" class="form-control" >
			</div>
	      </div>
	      <div class="modal-footer">
	        <button id = "addSrcFinModalButton" class="btn btn-success">Ajouter</button>
	      </div>
	    </div>
	  </div>
	</div>

</form>