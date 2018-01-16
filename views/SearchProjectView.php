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