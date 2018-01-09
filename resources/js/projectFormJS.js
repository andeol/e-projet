$(document).ready(function(){

	var task_index = 0;
	var detail_index = 0;

	//Preventing the user to insert non numeric values in some picked fields
	$('#duree').keypress(function(e){
		var key = e.which || e.keyCode;
		if(key != 8 && isNaN(String.fromCharCode(key)) /*&& key != 44*/){
           	e.preventDefault();
        }
	});

	$('#cout').keypress(function(e){
		var key = e.which || e.keyCode;
		if(key != 8 && isNaN(String.fromCharCode(key)) /*&& key != 44*/){
           	e.preventDefault();
        }
	});

	$('#addDetailButton').click(function(){
		$('#table_detail_body').append('<tr>\
	      <td><textarea id = "objectif_'+(detail_index+1)+'" class = "form-control" required ></textarea></td>\
	      <td><textarea id = "resultat_'+(detail_index+1)+'" class = "form-control" required ></textarea></td>\
	      <td><textarea id = "indicateur_'+(detail_index+1)+'" class = "form-control" required ></textarea></td>\
	      <td><textarea id = "risque_'+(detail_index+1)+'" class = "form-control" required ></textarea></td>\
	    </tr>');
	    detail_index++;
	});	

	$('#addActiviteButton').click(function(){
		$('#table_activite_body').append('<tr>\
	      <th scope="row">'+(task_index+1)+'</th>\
	      <td><input id = "activite_libelle_'+(task_index+1)+'" type = "text" class = "form-control" required /></td>\
	      <td><input id = "activite_date_'+(task_index+1)+'" type = "date" class = "form-control" placeholder= "JJ/MM/AAAA" required/></td>\
	      <td><input id = "activite_duree_'+(task_index+1)+'" type = "number" class = "form-control" required /></td>\
	    </tr>');
		task_index++;
	});	

	$('#addProjectButton').click(function(){
		//gathering all the details and tasks for sending them to the server
		$('#hidden_objectifs').val('');
		$('#hidden_resultats').val('');
		$('#hidden_indicateurs').val('');
		$('#hidden_risques').val('');

		$('#hidden_activite_libelles').val('');
		$('#hidden_activite_dates').val('');
		$('#hidden_activite_durees').val('');

		//gathering all details
		for (var i = 0; i < (detail_index+1); i++)
		{
			var objectif = $('#objectif_'+i).val();
			$('#hidden_objectifs').val($('#hidden_objectifs').val()+((i != 0) ? ';' : '')+objectif);

			var resultat = $('#resultat_'+i).val();
			$('#hidden_resultats').val($('#hidden_resultats').val()+((i != 0) ? ';' : '')+resultat);

			var indicateur = $('#indicateur_'+i).val();
			$('#hidden_indicateurs').val($('#hidden_indicateurs').val()+((i != 0) ? ';' : '')+indicateur);

			var risque = $('#risque_'+i).val();
			$('#hidden_risques').val($('#hidden_risques').val()+((i != 0) ? ';' : '')+risque);
		}

		for (var i = 0; i < (task_index+1); i++)
		{
			var libelle = $('#activite_libelle_'+i).val();
			$('#hidden_activite_libelles').val($('#hidden_activite_libelles').val()+((i != 0) ? ';' : '')+libelle);

			var date = $('#activite_date_'+i).val();
			$('#hidden_activite_dates').val($('#hidden_activite_dates').val()+((i != 0) ? ';' : '')+date);

			var duree = $('#activite_duree_'+i).val();
			$('#hidden_activite_durees').val($('#hidden_activite_durees').val()+((i != 0) ? ';' : '')+duree);
		}
	});
	
	/*
	$('.date_input').blur(function(){
		checkDateFormat($('#modal_activite_date').val());
	});

	var checkDateFormat = function(value){

		if (!/\d{2}\/\d{2}\/\d{4}/i.test(value) ){
			if (!$('#div_modal_activite_date').hasClass('has-error')){
				$('#div_modal_activite_date').addClass('has-error');
			}
		}
		else{
			if ($('#div_modal_activite_date').hasClass('has-error')){
				$('#div_modal_activite_date').removeClass('has-error');
			}
		}
	};
	*/

	/*
	$('#modal_activite_libelle').keypress(function(){
		if ($('#div_modal_activite_libelle').hasClass('has-error')){
			$('#div_modal_activite_libelle').removeClass('has-error');
		}
	});
	
	$('#modal_activite_duree').keypress(function(e){

		if ($('#div_modal_activite_duree').hasClass('has-error')){
			$('#div_modal_activite_duree').removeClass('has-error');
		}

		var key = e.which || e.keyCode;
		if(key == 48 || (key != 8 && isNaN(String.fromCharCode(key)))){
           	e.preventDefault();
        }
	});

	$('#modal_activite_date').keypress(function(e){

		if ($('#div_modal_activite_date').hasClass('has-error')){
			$('#div_modal_activite_date').removeClass('has-error');
		}

		var key = e.which || e.keyCode;
		if(key != 47 && key != 8 && isNaN(String.fromCharCode(key))){
           	e.preventDefault();
        }
	});

	var checkDateFormat = function(value){

		if (!/\d{2}\/\d{2}\/\d{4}/i.test(value) ){
			if (!$('#div_modal_activite_date').hasClass('has-error')){
				$('#div_modal_activite_date').addClass('has-error');
			}
		}
		else{
			if ($('#div_modal_activite_date').hasClass('has-error')){
				$('#div_modal_activite_date').removeClass('has-error');
			}
		}
	}

	$('#modal_activite_date').blur(function(){
		checkDateFormat($('#modal_activite_date').val());
	});

	// validating the activity provided
	$('#addModalActiviteButton').click(function(e){

		e.preventDefault();

		// checking if the 'libelle' field input of the activity'modal is valid
		if ($('#modal_activite_libelle').val() == '' && !$('#div_modal_activite_libelle').hasClass('has-error')){
			$('#div_modal_activite_libelle').addClass('has-error');
			$('#modal_activite_libelle').focus();
			return;
		}

		// checking if the 'date' field input of the activity'modal is valid
		if ($('#modal_activite_date').val() == '' && !$('#div_modal_activite_date').hasClass('has-error')){
			$('#div_modal_activite_date').addClass('has-error');
			$('#modal_activite_date').focus();
			return;
		}

		if ($('#div_modal_activite_date').hasClass('has-error')){
			$('#modal_activite_date').focus();
			return;
		}

		// checking if the 'duree' field input of the activity'modal is valid
		if ($('#modal_activite_duree').val() == ''){
			$('#div_modal_activite_duree').addClass('has-error');
			$('#modal_activite_duree').focus();
			return;
		}

		// Once, all the checks have been performed, we add the task to the table
		$('#table_activite_body').append('<tr id = "task_tr'+task_index+'">\
			<th scope="row">'+(task_index+1)+'</th>\
	    	<td>'+$('#modal_activite_libelle').val()+'</td>\
	    	<td>'+$('#modal_activite_date').val()+'</td>\
	    	<td>'+$('#modal_activite_duree').val()+'</td>\
	    	<td>\
		      	<a id = "task_edit_button_'+task_index+'" class = "task_edit_button btn" href="#"><img style = "width:17px; height=17px;"src = "http://'+parameters.ROOT_DIR+'/resources/images/glyphicons/glyphicons-31-pencil.png" ></a>\
		        <a id = "task_delete_button_'+task_index+'" class = "task_delete_button btn" href="#"><img style = "width:17px; height=17px;"src = "http://'+parameters.ROOT_DIR+'/resources/images/glyphicons/glyphicons-193-remove-sign.png" ></a>\
		    </td>\
	    </tr>');

	    // reseting the fields
	    $('#modal_activite_duree').val('');
	    $('#modal_activite_date').val('');
	    $('#modal_activite_libelle').val('');

	    // noticing to the user the addition of the current task
	    $('#add_activite_modal_body').prepend('<div style = "font-size:0.6em;" class="alert alert-info alert-dismissible fade show" role="alert">\
	          Activité ajoutée\
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
	            <span aria-hidden="true">&times;</span>\
	          </button>\
	        </div>');

	    // incrementing some variables
	    task_index++;

	});

	$('.task_delete_button').click(function(e){
		alert("ok");
		e.preventDefault();
		//$(this).parent().parent().remove();
	});
	*/

});