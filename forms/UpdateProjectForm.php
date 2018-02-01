<form class = "mt-3" method = "POST" action = 'http://<?= ROOT_DIR ?>updateProject'>

	<input id = "projetId"  name = "projetId" value = "<?= $projet->getId() ?>" hidden>
	<h3 class = "font-weight-light"> Infos projet 
		<a id = "checkCPCodeButton" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#getCPCodeModal">Modifier</a> 
		<a id = "printProjButton" href = "http://<?= ROOT_DIR ?>printPDF?idProject=<?= $projet->getId() ?>" class="btn btn-outline-primary btn-sm">Imprimer</a> 
		<a id = "printExcelButton" href = "http://<?= ROOT_DIR ?>printExcel?idProject=<?= $projet->getId() ?>" class="btn btn-outline-primary btn-sm">Excel</a> 
	</h3>

	<hr/>
	<div class="form-row">
		<div class = "col-md-4">
			<label for="" > Code du projet </label>
			<input id = "codeProjetInput" name = "prjcde" type="text" class="form-control" value = "<?php if (isset($projet)) echo $projet->getCode(); ?>" readonly>
		</div>

		<div class="col-md-4">
	    	<label for="" > Intitulé</label>
	      	<input id = "intituleInput" name = "intitule" type="text" class="form-control" placeholder="Intitulé" value = "<?php if (isset($projet)) echo $projet->getIntitule(); ?>" readonly required>
	    </div>

	</div>
	<div class="form-row">
		<div class="col">
	    	<label for="" >Objet</label>
	    	<input id = "objetInput" name = "objet" type="text" class="form-control" placeholder="Objet" value = "<?php if (isset($projet)) echo $projet->getObjet(); ?>" readonly required>
	    </div>
	    <div class="col">
	    	<label for="" >Coût prévisionnel</label>
	      	<input id = "coutInput" name = "cout" type="text" value = '0' class="form-control" placeholder="Coût prévisionnel" value = "<?php if (isset($projet)) echo $projet->getCout(); ?>" readonly required>
	    </div>
	     <div class="col">
	    	<label for="" >Chef Projet</label>
	      	<select id = "chefProjetInput" name = "chefProjet" class="form-control" disabled>
	      		<?php foreach ($chefsProjet as $chefProjet) { ?>
	      			<option value = "<?= $chefProjet->getNom().' '.$chefProjet->getPrenoms() ?>" 
	      				<?php if ($chefProjet->getId() == $projet->getChefProjet()->getId())
	      					echo "selected";
	      				 ?> > <?= $chefProjet->getNom().' '.$chefProjet->getPrenoms() ?></option>
	      		<?php }?>
	      	</select>
	    </div>
  	</div>

  	<div class="form-row mt-2">
	    <div class="col">
	    	<label for="" >Date de démarrage</label>
	      	<input id = "dateDemarrageInput" name = "dateDemarrage" type="date" class="form-control" value = "<?php if (isset($projet)) echo $projet->getDateDemarrage(); ?>" readonly required>
	    </div>
	    <div class="col">
	    	<label for="" >Durée</label>
	      	<input id = "dureeInput" name = "duree" type="number" value = '0' class="form-control" placeholder="Nombre de jours" value = "<?php if (isset($projet)) echo $projet->getDuree(); ?>" readonly required>
	    </div>
	    <div class="col-md-4">
	    	<label for="" > Date de fin</label>
	      	<input id = "dateFinInput" name = "dateFin" type="date" class="form-control"  value = "<?php if (isset($projet)) echo $projet->getDateFin(); ?>" readonly>
	    </div>
  	</div>

  	<div class="form-row mt-2">
  		<div class="col">
	    	<label for="" >Couche SI</label>
	    	<div class = "input-group">
		      	<select id = "coucheSiInput" name = "coucheSI" class="form-control" disabled> 
		      		<?php foreach ($couchesSI as $coucheSI) { ?>
		      			<option value = "<?= $coucheSI->getLibelle() ?>" 
		      				<?php 
		      				if ($coucheSI->getId() == $projet->getCoucheSI()->getId()){
		      					echo "selected";
		      				}
		      				?>> <?= $coucheSI->getLibelle() ?> </option>
		      		<?php }?>
		      	</select>
		      	<a id = "addCoucheSIButton" class = "btn btn-secondary input-group-addon disabled" data-toggle="modal" data-target="#addCoucheSIModal" disabled><img class = "img-fluid" style = "width:17px;height:17px;" src = "http://<?= ROOT_DIR ?>/resources/images/glyphicons/glyphicons-191-plus-sign.png"/></a>
		    </div>
	    </div>
	    <div class="col">
	    	<label for="" >Maîtrise d'Oeuvre</label>
	    	<div class = "input-group">
		      	<select id = "moInput" name = "maitriseOeuvre" class="form-control" disabled> 
		      		<?php foreach ($maitrisesOeuvre as $maitriseOeuvre) { ?>
		      			<option value = "<?= $maitriseOeuvre->getLibelle() ?>" 
		      				<?php 
		      				if  ($maitriseOeuvre->getId() == $projet->getMaitriseOeuvre()->getId()){
		      					echo "selected";
		      				}
		      				?> > <?= $maitriseOeuvre->getLibelle() ?> </option>
		      		<?php }?>
		      	</select>
		      	<a id = "addMaitriseOeuvreButton" class = "btn btn-secondary input-group-addon disabled" data-toggle="modal" data-target="#addMaitriseOeuvreModal" disabled><img class = "img-fluid" style = "width:17px;height:17px;" src = "http://<?= ROOT_DIR ?>/resources/images/glyphicons/glyphicons-191-plus-sign.png"/></a>
		    </div>
	    </div>
	    <div class="col">
	    	<label for="" >Source de financement</label>
	    	<div class = "input-group">
	      		<select id = "srcFinInput" name = "sourceFinancement" class="form-control" disabled> 
		      		<?php foreach ($sourcesFinancement as $sourceFinancement) { ?>
		      			<option value = "<?= $sourceFinancement->getLibelle() ?>" 
		      			<?php 
		      			if ($sourceFinancement->getId() == $projet->getSourceFinancement()->getId()){
		      				echo "selected";
		      			}
		      			?> > <?= $sourceFinancement->getLibelle() ?> </option>
		      		<?php }?>
		      	</select>
	      		<a id ="addSrcFinButton" class = "btn btn-secondary input-group-addon disabled" data-toggle="modal" data-target="#addSrcFinModal" disabled><img class = "img-fluid" style = "width:17px;height:17px;" src = "http://<?= ROOT_DIR ?>/resources/images/glyphicons/glyphicons-191-plus-sign.png"/></a>
	      	</div>
	    </div>
  	</div>

  	<div class="form-row mt-2">
	    <div class="col">
	    	<label for="" >Description</label>
		    <textarea id = "descriptionInput" name = "description" type="text" class="form-control" placeholder="Description" readonly required> <?php if (isset($projet)) echo $projet->getDescription(); ?> </textarea>
	    </div>
  	</div>

  	<h3 class = "font-weight-light mt-5"> Infos supplémentaires <a id = "addDetailButton" class="btn btn-outline-primary btn-sm disabled" >Ajouter</a></h3>
	<hr/>

	<?php include_once("DetailTableProjectForm2.php") ?>

  	<h3 class = "font-weight-light mt-5"> Planning prévisionnel <a id = "addActiviteButton" class="btn btn-outline-primary btn-sm disabled" disabled >Ajouter</a></h3>
	<hr/>

	<?php include_once("ActiviteTableProjectForm2.php") ?>

	<h3 class = "font-weight-light mt-5"> Perspectives <h3>
	<hr/>
	<div class="form-row mt-2 w-">
		<textarea id = "perspectivesInput" name = "perspectives" type="text" class="form-control" placeholder="Perspectives" readonly required> <?php if (isset($projet)) echo $projet->getPerspectives(); ?> </textarea>
  	</div>

	<div class="text-center">
  		<button id = "updateProjectButton" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal" disabled>Sauvegarder</button>
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
	        Confirmez-vous la modification de ce projet?
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

	<div class="modal fade font-weight-light" id="getCPCodeModal" tabindex="-1" role="dialog" aria-labelledby="getCPCodeModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="getCPCodeModalLabel">Vérification du code du chef projet</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <div id = "getCPCodeModalBody" class="modal-body">

			<div class = "">
				<label for="" > Code du Chef Projet </label>
				<input id = "getCPCodeModalInput" type="text" class="form-control">
			</div>
	      </div>
	      <div class="modal-footer">
	        <button id = "getCPCodeModalButton" class="btn btn-success">Vérifier</button>
	      </div>
	    </div>
	  </div>
	</div>

</form>