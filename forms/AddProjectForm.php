<form id ="addProjectForm" class = "mt-3" method = "POST" action = 'http://<?= ROOT_DIR ?>addProject'>

	<h3 class = "font-weight-light">Infos projet</h3>
	<hr/>

	<!-- hidden fields -->
	<!--<input id = "codeChefProjetInput" name = "codeChefProjet" hidden>-->

	<div class="form-row">
		<div class = "col-md-4">
			<label for="" > Code du projet </label>
			<input id = "codeProjetInput" name = "prjcde" type="text" class="form-control" style = "background-color:white;" value = "<?= $codeProjet ?>" readonly required>
		</div>

		<div class="col-md-4">
	    	<label for="" > Intitulé</label>
	      	<input name = "intitule" type="text" class="form-control" placeholder="Intitulé" required>
	    </div>

	</div>
	<div class="form-row">
		<div class="col">
	    	<label for="" >Objet</label>
	    	<input name = "objet" type="text" class="form-control" placeholder="Objet" required>
	    </div>
	    <div class="col">
	    	<label for="" >Coût prévisionnel</label>
	      	<input id = "coutInput" name = "cout" type="text" value = '0' class="form-control" placeholder="Coût prévisionnel" required>
	    </div>
	     <div id = "divChefProjetInput" class="col">
	    	<label for="" >Chef Projet</label>
	      	<select id = "chefProjetInput" name = "chefProjet" class="form-control" required>
	      		<option value = "" selected> Sélectionner Chef Projet </option>
	      		<?php foreach ($chefsProjet as $chefProjet) { ?>
	      			<option value = "<?= $chefProjet->getNom().' '.$chefProjet->getPrenoms() ?>"> <?= $chefProjet->getNom().' '.$chefProjet->getPrenoms() ?></option>
	      		<?php }?>
	      	</select>
	    </div>
  	</div>

  	<div class="form-row mt-2">
	    <div id = "divDateDemarrageInput" class="col">
	    	<label for="" >Date de démarrage</label>
	      	<input id = "dateDemarrageInput" name = "dateDemarrage" type="date" class="form-control" placeholder="JJ/MM/AAAA" required>
	    </div>
	    <div id = "divDateFinInput" class="col-md-4">
	    	<label for="" > Date de fin </label>
	      	<input id = "dateFinInput" name = "dateFin" type="date" class="form-control" style = "background-color:white;" placeholder="Date de fin" required>
	    </div>
	    <div class="col">
	    	<label for="" >Durée</label>
	      	<input id = "dureeInput" name = "duree" type="number" value = '0' class="form-control" placeholder="Nombre de jours" readonly>
	    </div>
  	</div>

  	<div class="form-row mt-2">
  		<div id = "divCoucheSiInput" class="col">
	    	<label for="" >Couche SI</label>
	    	<div class = "input-group">
		      	<select id = "coucheSiInput" name = "coucheSI" class="form-control" required> 
		      		<option value = "" selected> Sélectionner Couche SI </option>
		      		<?php foreach ($couchesSI as $coucheSI) { ?>
		      			<option value = "<?= $coucheSI->getLibelle() ?>"> <?= $coucheSI->getLibelle() ?> </option>
		      		<?php }?>
		      	</select>
		      	<a id = "addCoucheSIButton" class = "btn btn-secondary input-group-addon" data-toggle="modal" data-target="#addCoucheSIModal"><img class = "img-fluid" style = "width:17px;height:17px;" src = "http://<?= ROOT_DIR ?>/resources/images/glyphicons/glyphicons-191-plus-sign.png"/></a>
		    </div>
	    </div>
	    <div id = "divMoInput" class="col">
	    	<label for="" >Maîtrise d'Oeuvre</label>
	    	<div  class = "input-group">
		      	<select id = "moInput" name = "maitriseOeuvre" class="form-control" required>
		      		<option value = "" selected > Sélectionner Maitrise d'Oeuvre </option> 
		      		<?php foreach ($maitrisesOeuvre as $maitriseOeuvre) { ?>
		      			<option value = "<?= $maitriseOeuvre->getLibelle() ?>"> <?= $maitriseOeuvre->getLibelle() ?> </option>
		      		<?php }?>
		      	</select>
		      	<a id = "addMaitriseOeuvreButton" class = "btn btn-secondary input-group-addon" data-toggle="modal" data-target="#addMaitriseOeuvreModal"><img class = "img-fluid" style = "width:17px;height:17px;" src = "http://<?= ROOT_DIR ?>/resources/images/glyphicons/glyphicons-191-plus-sign.png"/></a>
		    </div>
	    </div>
	    <div id = "divSrcFinInput" class="col">
	    	<label for="" >Source de financement</label>
	    	<div class = "input-group">
	      		<select id = "srcFinInput" name = "sourceFinancement" class="form-control" required> 
	      			<option value = "" selected> Sélectionner Source de Financement </option>
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
	    	<label for="" >Description</label>
		    <textarea name = "description" type="text" class="form-control" placeholder="Description" required></textarea>
	    </div>
  	</div>

  	<h3 class = "font-weight-light mt-5"> Infos supplémentaires <a id = "addDetailButton" class="btn btn-outline-primary btn-sm">Ajouter</a></h3>
	<hr/>

	<?php include_once("DetailTableProjectForm.php") ?>

  	<h3 class = "font-weight-light mt-5"> Planning prévisionnel <a id = "addActiviteButton" class="btn btn-outline-primary btn-sm">Ajouter</a></h3>
	<hr/>

	<?php include_once("ActiviteTableProjectForm.php") ?>

	<h3 class = "font-weight-light mt-5"> Perspectives </h3>
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
	      <div class="modal-body" >
	        <label for ="codeChefProjetModalInput">Confirmez cet enregistrement en entrant votre code de chef projet </label>
	        <input class = "form-control mt-2" id = "codeChefProjetModalInput" name = "codeChefProjet" placeholder = "Code" required>
	      </div>
	      <div class="modal-footer">
	        <button id = "validSavingButton" class="btn btn-success">Oui</button>
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
				<label for="" > Libellé </label>
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
				<label for="" > Libellé </label>
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
				<label for="" > Libellé </label>
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