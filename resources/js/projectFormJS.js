$(document).ready(function(){

	var task_index = 0;
	var detail_index = 0;
	var show_per_page = 7;
	var current_page = 0;

	//Preventing the user to insert non numeric values in some picked fields

	
	$('#dureeInput').keypress(function(e){
		var key = e.which || e.keyCode;
		if(key != 8 && isNaN(String.fromCharCode(key))){
           	e.preventDefault();
        }
	});

	$('#tauxExecutionInput').keypress(function(e){
		var key = e.which || e.keyCode;
		if(key != 8 && isNaN(String.fromCharCode(key))){
           	e.preventDefault();
        }
	});

	$('#coutInput').keypress(function(e){
		var key = e.which || e.keyCode;
		if(key != 8 && isNaN(String.fromCharCode(key))){
           	e.preventDefault();
        }
	});
	
	$('#codeChefProjetModalInput').keypress(function(e){
		if ($('#exampleModal .modal-body').hasClass('has-error')){
			$('#exampleModal .modal-body').removeClass('has-error');
		}
	});

	$('#validSavingButton').click(function(e){
		//e.preventDefault();

		/*
		// checking if the code has been provided
		if ($('#codeChefProjetModalInput').val() == ''){
			$('#exampleModal .modal-body').addClass('has-error');
			return false;
		}*/

		$('#exampleModal').modal('hide');
		
	});

	$('#addDetailButton').click(function(){
		$('#table_detail_body').append('<tr>\
	      <td><textarea id = "objectif_'+(detail_index+1)+'" class = "form-control" required ></textarea></td>\
	      <td><textarea id = "resultat_'+(detail_index+1)+'" class = "form-control" required ></textarea></td>\
	      <td><textarea id = "indicateur_'+(detail_index+1)+'" class = "form-control" required ></textarea></td>\
	      <td><textarea id = "risque_'+(detail_index+1)+'" class = "form-control" required ></textarea></td>\
	      <td><button id = "delete_detail_button_'+(detail_index+1)+'" class = "btn delete_button"><img class = "img-fluid" style = "width:17px;height:17px;" src = "http://'+parameters.ROOT_DIR+'/resources/images/glyphicons/glyphicons-193-remove-sign.png"/></button></td>\
	    </tr>');
	    detail_index++;
	});	

	// After addind a new task, someone would like to get back before the addition
	$('#table_detail_body').on('click', 'button.delete_button', function(e){
		e.preventDefault();
		$(this).parent().parent().remove();
		task_index--;

		var i = 0;
		$('#table_detail_body').children('tr').each(function(){
			var j = 0;
		    $(this).children().each(function(){
		    	switch(j){
		   			case 0:
		   				$(this).children('textarea').prop("id", "objectif_"+i)
		   				break;
		   			case 1:
		   				$(this).children('textarea').prop("id", "resultat_"+i);
		   				break;
		   			case 2:
		   				$(this).children('textarea').prop("id", "indicateur_"+i);
		   				break;
		   			case 3:
		   				$(this).children('textarea').prop("id", "risque_"+i);
		   				break;
		   			case 4:
		   				$(this).children('button').prop("id", "delete_detail_button_"+i);
		   				break;
		   			default:
		   				//nothing to do here  yet
		   				$(this);
		    	}
		    	j++;
		    });
		    i++;
		});
	});

	// After addind a new detail on the project, someone would like to get back before the addition
	$('#table_detail_body').on('click', 'button.delete_button', function(e){
		e.preventDefault();
		$(this).parent().parent().remove();
		detail_index--;

	});

	$('#addActiviteButton').click(function(){
		$('#table_activite_body').append('<tr>\
	      <th scope="row">'+(task_index+1)+'</th>\
	      <td><input id = "activite_libelle_'+(task_index+1)+'" type = "text" class = "form-control" required /></td>\
	      <td><input id = "activite_date_'+(task_index+1)+'" type = "date" class = "form-control" placeholder= "JJ/MM/AAAA" required/></td>\
	      <td><input id = "activite_duree_'+(task_index+1)+'" type = "number" value = "0" min = "0" class = "form-control" required /></td>\
	      <td><button id = "delete_task_button_'+(task_index+1)+'" class = "btn delete_button"><img class = "img-fluid" style = "width:17px;height:17px;" src = "http://'+parameters.ROOT_DIR+'/resources/images/glyphicons/glyphicons-193-remove-sign.png"/></button></td>\
	    </tr>');
		task_index++;
	});	

	// After addind a new task, someone would like to get back before the addition
	$('#table_activite_body').on('click', 'button.delete_button', function(e){
		e.preventDefault();
		$(this).parent().parent().remove();
		task_index--;

		var i = 0;
		$('#table_activite_body').children('tr').each(function(){
			var j = 0;
		    $(this).children().each(function(){
		    	switch(j){
		   			case 0:
		   				$(this).text(i);
		   				break;
		   			case 1:
		   				$(this).children('input').prop("id", "activite_libelle_"+i);
		   				break;
		   			case 2:
		   				$(this).children('input').prop("id", "activite_date_"+i);
		   				break;
		   			case 3:
		   				$(this).children('input').prop("id", "activite_duree_"+i);
		   				break;
		   			case 4:
		   				$(this).children('button').prop("id", "delete_task_button_"+i);
		   				break;
		   			default:
		   				//nothing to do here  yet
		   				$(this);
		    	}
		    	j++;
		    });
		    i++;
		});
	});

	$('#addProjectButton').click(function(e){
		
		e.preventDefault();

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

	$('#updateProjectButton').click(function(e){
		
		e.preventDefault();

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
	
	$('#addCSIModalButton').click(function(e){

		e.preventDefault();

		if ($('#coucheSIModalLibelle').val() == ""){
			$('#cSIModalBody').addClass('has-error');
			$('#coucheSIModalLibelle').focus();
			return;
		}

		$('#coucheSiInput').append('<option value = "'+ $('#coucheSIModalLibelle').val() +'">\
		 '+ $('#coucheSIModalLibelle').val() +' \
		 </option>');

		
		$('#cSIModalBody').prepend('<div class="alert alert-success alert-dismissible fade show" style = "font-size:0.6em;" role="alert"> \
			  <strong> Couche SI ajoutée \
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> \
			    <span aria-hidden="true">&times;</span> \
			  </button> \
			</div>');
		
		$('#coucheSIModalLibelle').val("");
	});

	$('#coucheSIModalLibelle').keypress(function(){
		if ($('#cSIModalBody').hasClass('has-error')){
			$('#cSIModalBody').removeClass('has-error');
		}
	});

	$('#addMoModalButton').click(function(e){

		e.preventDefault();

		if ($('#moModalLibelle').val() == ""){
			$('#moModalBody').addClass('has-error');
			$('#moModalLibelle').focus();
			return;
		}

		$('#moInput').append('<option value = "'+ $('#moModalLibelle').val() +'">\
		 '+ $('#moModalLibelle').val() +' \
		 </option>');

		
		$('#moModalBody').prepend('<div class="alert alert-success alert-dismissible fade show" style = "font-size:0.6em;" role="alert"> \
			  <strong> Maitrise d\'Oeuvre ajoutée \
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> \
			    <span aria-hidden="true">&times;</span> \
			  </button> \
			</div>');
		
		$('#moModalLibelle').val("");
	});

	$('#moModalLibelle').keypress(function(){
		if ($('#moModalBody').hasClass('has-error')){
			$('#moModalBody').removeClass('has-error');
		}
	});

	$('#addSrcFinModalButton').click(function(e){

		e.preventDefault();

		if ($('#srcFinModalLibelle').val() == ""){
			$('#srcFinModalBody').addClass('has-error');
			$('#srcFinModalLibelle').focus();
			return;
		}

		$('#srcFinInput').append('<option value = "'+ $('#srcFinModalLibelle').val() +'">\
		 '+ $('#srcFinModalLibelle').val() +' \
		 </option>');

		
		$('#srcFinModalBody').prepend('<div class="alert alert-success alert-dismissible fade show" style = "font-size:0.6em;" role="alert"> \
			  <strong> Source de financement ajoutée \
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> \
			    <span aria-hidden="true">&times;</span> \
			  </button> \
			</div>');
		
		$('#srcFinModalLibelle').val("");
	});

	$('#srcFinModalLibelle').keypress(function(){
		if ($('#srcFinModalBody').hasClass('has-error')){
			$('#srcFinModalBody').removeClass('has-error');
		}
	});


	// launching an ajax request to check the project leader code given
	$('#getCPCodeModalButton').click(function(e){
		e.preventDefault();

		//alert('http://'+parameters.ROOT_DIR+"checkCPCode?chefProjetCode="+$('#getCPCodeModalInput').val()+"&projetId="+$('#projetId').val());

		// an ajax request
		$.ajax({

			url			: 'http://'+parameters.ROOT_DIR+"checkCPCode?chefProjetCode="+$('#getCPCodeModalInput').val()+"&projetId="+$('#projetId').val(), 
			type 		: "GET", 
			dataType	: "json",

			success 	: function(response, status){
							if (response != null){
								handleCPCodeCheckResponse(response);
							}
							else
								alert("An error occured when checking the code ! Please retry later!");
			},

			error 		: function(response, status, error){
							alert("error");
			},

			complete	: function(response, status){
							//alert("complete");
			}

		});
	});

	var handleCPCodeCheckResponse = function(response){
		if (response == 0)
			alert("Code erroné");
		else{
			$('#getCPCodeModal').modal('hide');

			// enabling all the input
			$('#codeProjetInput').prop('readonly', false);
			$('#intituleInput').prop('readonly', false);
			$('#objetInput').prop('readonly', false);
			$('#coutInput').prop('readonly', false);
			$('#chefProjetInput').prop('disabled', false);
			$('#dateDemarrageInput').prop('readonly', false);
			$('#dureeInput').prop('readonly', false);
			$('#dateFinInput').prop('readonly', false);
			$('#coucheSiInput').prop('disabled', false);
			$('#moInput').prop('disabled', false);
			$('#srcFinInput').prop('disabled', false);
			$('#descriptionInput').prop('readonly', false);
			$('#perspectivesInput').prop('readonly', false);
			$('#updateProjectButton').prop('disabled', false);
			$('#addCoucheSIButton').removeClass('disabled');
			$('#addMaitriseOeuvreButton').removeClass('disabled');
			$('#addSrcFinButton').removeClass('disabled');
			if (parameters.PROJ_STATUS != "Terminés"){
				$('#tauxExecutionInput').prop('readonly', false);
			}

			//enabling project's task input
			$('#activite_libelle_0').prop('readonly', false);
			$('#activite_date_0').prop('readonly', false);
			$('#activite_duree_0').prop('readonly', false);
			$('#addActiviteButton').removeClass('disabled');

			// enabling detail fields
			$('#objectif_0').prop('readonly', false);
			$('#resultat_0').prop('readonly', false);
			$('#indicateur_0').prop('readonly', false);
			$('#risque_0').prop('readonly', false);
			$('#addDetailButton').removeClass('disabled');
		}
	};

	/*
	$('#addProjectForm').onsubmit(function(e)){

		if ($('#codeChefProjetModalInput').val() == ''){
			return false;
		}
	}
	

	// Handle the code of the project leader in an hidden fields
	$('#codeChefProjetModalInput').keypress(function(e){
		$('#codeChefProjetInput').val($('#codeChefProjetInput').val());
	});
	*/

	var dateDiff = function(date1, date2){

		//alert(date1+" / "+date2);

	    var diff = {}                           // Initialisation du retour
	    var tmp = date2 - date1;
	 
	    tmp = Math.floor(tmp/1000);             // Nombre de secondes entre les 2 dates
	    diff.sec = tmp % 60;                    // Extraction du nombre de secondes
	 
	    tmp = Math.floor((tmp-diff.sec)/60);    // Nombre de minutes (partie entière)
	    diff.min = tmp % 60;                    // Extraction du nombre de minutes
	 
	    tmp = Math.floor((tmp-diff.min)/60);    // Nombre d'heures (entières)
	    diff.hour = tmp % 24;                   // Extraction du nombre d'heures
	     
	    tmp = Math.floor((tmp-diff.hour)/24);   // Nombre de jours restants
	    diff.day = tmp;
	     
	    return diff.day;

	};

	$('#dateDemarrageInput').on('change',function(e){
		//alert($('#dateFinInput').val());
		var today = new Date();
		if (new Date($(this).val()) < today && dateDiff(new Date($(this).val()), today) != 0){
				$(this).val('');
				$('#divDateDemarrageInput').addClass('has-error');
				return;
		}

		if ($('#divDateDemarrageInput').hasClass('has-error'))
			$('#divDateDemarrageInput').removeClass('has-error');

		var dateFin = $('#dateFinInput').val();
		if (dateFin != ''){
			if (new Date($(this).val()) >= new Date(dateFin)){
				$(this).val('');
				$('#divDateDemarrageInput').addClass('has-error');
				return;
			}
			$('#dureeInput').val(dateDiff(new Date($(this).val()), new Date(dateFin)));
		}
	});

	$('#dateFinInput').on('change',function(e){
		//alert($('#dateDemarrageInput').val());

		if ($('#divDateFinInput').hasClass('has-error'))
			$('#divDateFinInput').removeClass('has-error');

		var dateDemarrage = $('#dateDemarrageInput').val();

		if (dateDemarrage != ''){
			if (new Date($(this).val()) <= new Date(dateDemarrage)){
				$(this).val('');
				$('#divDateFinInput').addClass('has-error');
				return;
			}
			$('#dureeInput').val(dateDiff(new Date(dateDemarrage), new Date($(this).val())));
		}
	});

	// checking that the date for starting a task is between the opening date and ending date of the project
	$('#table_activite_body').on('change', 'input[type=date]', function(e){

		if ($('#dateDemarrageInput').val() == ''){
			alert("La date de démarrage et celle de fin du projet doit être renseignée en premier ! ");
			if (!$('#divDateDemarrageInput').hasClass('has-error')){
				$('#divDateDemarrageInput').addClass('has-error');
			}
			$('#divDateDemarrageInput').focus();
			$(this).val('');
			return;
		}

		if ($('#dateFinInput').val() == ''){
			alert("La date de fin du projet doit être renseignée en premier ! ");
			if (!$('#divDateFinInput').hasClass('has-error')){
				$('#divDateFinInput').addClass('has-error');
			}
			$('#divDateFinInput').focus();
			$(this).val('');
			return;
		}

		if (new Date($('#dateDemarrageInput').val()) > new Date($(this).val())){
			alert('La date d\'activité est inférieure à la date de démarrage du projet!');
			$(this).val('');
			return;
		}
		if (new Date($('#dateFinInput').val()) < new Date($(this).val())){
			alert('La date d\'activité est supérieure à la date de fin du projet!');
			$(this).val('');
			return;
		}

		// Setting the max value of the duration field just besides this one on the form
		var dureeInput = $(this).parent().next().children();
		dureeInput.prop("max",dateDiff(new Date($(this).val()), new Date($('#dateFinInput').val())));
		
	});	

	// Prevent the duration of a task from exceeding the duration of the whole project
	$('#table_activite_body').on('change', 'input[type=number]', function(e){
		
		
		if ($('#dateFinInput').val() == ''){

			$(this).val(0);

			alert("Le champ date fin est vide. Veuillez le remplir avant de continuer!");
			if (!$('#divDateFinInput').hasClass('has-error')){
				$('#divDateFinInput').addClass('has-error');
				$('#dateFinInput').focus();
			}
			return;
		}

		
		var duree_parent = $(this).parent();
		var date_parent = duree_parent.prev();
		var dateDebut = date_parent.children();
		if (dateDebut.val() == ''){
			$(this).val(0);
			alert("Le champ date de début de l'activité est vide. Veuillez le remplir avant de continuer!");
			dateDebut.focus();
			return;
		}

	});

	// Once the cap of 100% of "tauxExecution" is hit, the button "Terminer is unlocked"
	$('#tauxExecutionInput').keyup(function(){
		//alert($(this).val());
		if ($(this).val() == "100"){
			$('#endProjectButton').prop('disabled', false);
		}
		else{
			$('#endProjectButton').prop('disabled', true);
		}
	});

	$('#tauxExecutionInput').change(function(){
		//alert($(this).val());
		if ($(this).val() == "100"){
			$('#endProjectButton').prop('disabled', false);
		}
		else{
			$('#endProjectButton').prop('disabled', true);
		}
	});

	$('#endProjectButton').click(function(e){
		e.preventDefault();
	});

	$('#endProjectModalButton').click(function(e){
		e.preventDefault();
		$('#endProjectModal').modal('hide');
		// sending an ajax request to turn the projet into a "ended" status
		// alert('http://'+parameters.ROOT_DIR+"endProject?projectId="
		// 					+$('#projetId').val());

		$.ajax({

			url			: 'http://'+parameters.ROOT_DIR+"endProject?projectId="
							+$('#projetId').val(), 
			type 		: "POST", 

			dataType	: "json",

			success 	: function(response, status){
							if (response != null){
								alert("Projet terminé !");
							}
							else
								alert("A problem occured when marking the project as finished! ");
			},

			error 		: function(response, status, error){
							alert("error");
			},

			complete	: function(response, status){
							//alert("complete");
			}

		});
	});

});