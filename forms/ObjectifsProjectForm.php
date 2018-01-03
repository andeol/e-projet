<div class = "form-row">

		<table class="table font-weight-light col" style = "font-size:.6em;">
		  <thead >
		    <tr>
		      <th scope="col">Objectifs <a id = "addObjectifButton" class = "btn" href="#"><img style = "width:17px; height=17px;"src = "http://<?php echo ROOT_DIR ?>/resources/images/glyphicons/glyphicons-191-plus-sign.png" ></a></th>
		      <th scope="col" > Résultats<a id = "addResultatButton" class = "btn" href="#"><img style = "width:17px; height=17px;"src = "http://<?php echo ROOT_DIR ?>/resources/images/glyphicons/glyphicons-191-plus-sign.png" ></a></th>
		      <th scope="col" > Indicateurs<a class = "btn" data-toggle="modal" data-target="#addModal" href="#"><img style = "width:17px; height=17px;"src = "http://<?php echo ROOT_DIR ?>/resources/images/glyphicons/glyphicons-191-plus-sign.png" ></a></th>
		      <th scope="col">Contraintes et risques <a class = "btn" data-toggle="modal" data-target="#addModal" href="#"><img style = "width:17px; height=17px;"src = "http://<?php echo ROOT_DIR ?>/resources/images/glyphicons/glyphicons-191-plus-sign.png" ></a></th>
		    </tr>
		  </thead>
		  <tbody id = "table_description_body">
		    <tr>
		    	<td><input type = "text" class = "form-control" /></td>
		    	<td><input type = "text" class = "form-control" /></td>
		    	<td><input type = "text" class = "form-control" /></td>
		    	<td><input type = "text" class = "form-control" /></td>
		    </tr>

		    <tr>
		    	<td><input type = "text" class = "form-control" /></td>
		    	<td><input type = "text" class = "form-control" /></td>
		    	<td><input type = "text" class = "form-control" /></td>
		    	<td><input type = "text" class = "form-control" /></td>
		    </tr>

		  </tbody>
		</table>

</div>

<!-- Modal to confirm the record of the project into the database -->
	<div class="modal fade font-weight-light" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="addModalLabel">Activités</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	         <form>

	          <div class = "form-row">
	            <label for="" style = "font-size:.6em;">Activité</label>
	            <textarea type="text" class="form-control" placeholder="Activités"></textarea>
	          </div>

	        </form>
	      </div>
	      <div class="modal-footer">
	        <button href="#" class="btn btn-success">Ajouter</button>
	      </div>
	    </div>
	  </div>
	</div>


