<form>
	<h3 class = "font-weight-light">Infos projet<h3>
	<hr/>
	<div class="form-row">
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Intitulé</label>
	      	<input type="text" class="form-control" placeholder="Intitulé">
	    </div>
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Durée</label>
	      	<input type="text" class="form-control" placeholder="Durée">
	    </div>
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Maîtrise d'Oeuvre</label>
	      	<input type="text" class="form-control" placeholder="Maîtrise d'Oeuvre">
	    </div>
  	</div>

  	<div class="form-row mt-2">
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Objet</label>
	    	<input type="text" class="form-control" placeholder="Objet">
	    </div>
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Date de démarrage</label>
	      	<input type="text" class="form-control" placeholder="JJ/MM/AAAA">
	    </div>
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Couche SI</label>
	      	<input type="text" class="form-control" placeholder="Couche SI">
	    </div>
  	</div>

  	<div class="form-row mt-2">
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Chef Projet</label>
	      	<select class="form-control">
	      		<option value = "test"> test </option>
	      	</select>
	    </div>
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Coût prévisionnel</label>
	      	<input type="text" class="form-control" placeholder="Coût prévisionnel">
	    </div>
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Source de financement</label>
	      <input type="text" class="form-control" placeholder="Source de financement">
	    </div>
  	</div>

  	<div class="form-row mt-2">
	    <div class="col">
	    	<label for="" style = "font-size:.6em;">Description</label>
		    <textarea type="text" class="form-control" placeholder="Description"></textarea>
	    </div>
  	</div>

  	<!--
  	<div class="form-row mt-2">
	    <div class="col">
	    	<label for="" style = "font-size:.6em;"> Objectifs </label>
	      	<div id="proj_obj" class="form-control h-100" contenteditable = "true"></div>
	    </div>
	    <div class="col">
	    	<label for="" style = "font-size:.6em;"> Résultats </label>
	      	<div id="" class="form-control h-100" contenteditable = "true"></div>
	    </div>
	    <div class="col">
	    	<label for="" style = "font-size:.6em;"> Indicateurs </label>
	      	<div id="" class="form-control h-100" contenteditable = "true"></div>
	    </div>
	    <div class="col">
	    	<label for="" style = "font-size:.6em;"> Contraintes et Risques </label>
	      	<div id="" class="form-control h-100" contenteditable = "true"></div>
	    </div>
  	</div>
	-->

  	<h3 class = "font-weight-light mt-5"> Infos supplémentaires<h3>
	<hr/>

	<?php include_once("ObjectifsProjectForm.php") ?>

  	<h3 class = "font-weight-light mt-5"> Planning prévisionnel <button id = "addActivityButton" type="button" class="btn btn-outline-primary btn-sm" >Ajouter</button><h3>
	<hr/>

	<?php include_once("ActivitesProjectForm.php") ?>

	<div class="text-center">
  		<a class="btn btn-secondary mt-3" data-toggle="modal" data-target="#exampleModal">Enregistrer</a>
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