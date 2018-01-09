<form method = "POST" action = 'http://<?= ROOT_DIR ?>'>

	<input name = "controller" value = "projetController" hidden />
	<input name = "action" value="addProject" hidden />

	<h3 class = "font-weight-light">Infos projet<h3>
	<hr/>
	<div class="form-row">
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Intitulé</label>
	      	<input name = "intitule" type="text" class="form-control" placeholder="Intitulé" required>
	    </div>
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Durée</label>
	      	<input id = "duree" name = "duree" type="number" class="form-control" placeholder="Nombre de jours" required>
	    </div>
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Maîtrise d'Oeuvre</label>
	      	<input name = "maitriseOeuvre" type="text" class="form-control" placeholder="Maîtrise d'Oeuvre" required>
	    </div>
  	</div>

  	<div class="form-row mt-2">
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Objet</label>
	    	<input name = "objet" type="text" class="form-control" placeholder="Objet" required>
	    </div>
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Date de démarrage</label>
	      	<input name = "dateDemarrage" type="date" class="form-control" placeholder="JJ/MM/AAAA" required>
	    </div>
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Couche SI</label>
	      	<input name = "coucheSI" type="text" class="form-control" placeholder="Couche SI" required>
	    </div>
  	</div>

  	<div class="form-row mt-2">
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Chef Projet</label>
	      	<select name = "chefProjet" class="form-control">
	      		<?php foreach ($chefsProjet as $chefProjet) { ?>
	      			<option value = "<?= $chefProjet->getNom().' '.$chefProjet->getPrenoms() ?>"> <?= $chefProjet->getNom().' '.$chefProjet->getPrenoms() ?></option>
	      		<?php }?>
	      	</select>
	    </div>
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Coût prévisionnel</label>
	      	<input id = "cout" name = "cout" type="text" class="form-control" placeholder="Coût prévisionnel" required>
	    </div>
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Source de financement</label>
	    	<div class = "input-group">
	      		<input name = "financement" type="text" class="form-control" placeholder="Source de financement" required>
	      		<button class = "btn btn-secondary input-group-addon"><img class = "img-fluid" style = "width:17px;height:17px;" src = "http://<?= ROOT_DIR ?>/resources/images/glyphicons/glyphicons-191-plus-sign.png"/></button>
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
  		<a id = "addProjectButton" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">Enregistrer</a>
  	</div>

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
	        <button href="#" class="btn btn-success">Oui</button>
	      </div>
	    </div>
	  </div>
	</div>

</form>