$(document).ready(function(){

	var task_index = 0;
	var detail_index = 0;
	var show_per_page = 7;
	var current_page = 0;

	//Preventing the user to insert non numeric values in some picked fields

	/*
	$('#duree').keypress(function(e){
		var key = e.which || e.keyCode;
		if(key != 8 && isNaN(String.fromCharCode(key))){
           	e.preventDefault();
        }
	});

	$('#cout').keypress(function(e){
		var key = e.which || e.keyCode;
		if(key != 8 && isNaN(String.fromCharCode(key))){
           	e.preventDefault();
        }
	});
	*/

	$('#validSavingButton').click(function(e){
		$('#exampleModal').modal('hide');
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
	      <td><input id = "activite_duree_'+(task_index+1)+'" type = "number" value = 0 class = "form-control" required /></td>\
	    </tr>');
		task_index++;
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

			//enabling project's task input
			//for 
		}
	};

	/*
	function set_display(first, last) {
		$('#content').children().css('display', 'none');
		$('#content').children().slice(first, last).css('display',	'block');
	}

	function previous(){
		if($('.active').prev('.page_link').length)
			go_to_page(current_page - 1);
	}

	function next(){
		if($('.active').next('.page_link').length)
			go_to_page(current_page + 1);
	}
	
	function go_to_page(page_num){
		current_page = page_num;
		start_from = current_page * show_per_page;
		end_on = start_from + show_per_page;
		set_display(start_from, end_on);
		$('.active').removeClass('active');
		$('#id' + page_num).addClass('active');
	}
	$(document).ready(function() {
	var number_of_pages =
	Math.ceil($('#content').children().size() / show_per_page);
	var nav = '<ul class="pagination"><li><ahref="javascript:previous();"><<</a>';
	var i = -1;
	while(number_of_pages > ++i){
	nav += '<li class="page_link'
	if(!i) nav += ' active';
	nav += '" id="id' + i +'">';
	nav += '<a href="javascript:go_to_page(' + i +')">'+ (i + 1)
	+'</a>';
	}
	nav += '<li><a href="javascript:next();">>></a></ul>';
	$('#page_navigation').html(nav);
	set_display(0, show_per_page);
	});

		// Once the project to get updated has been selected, we fill the form fields with its data
		$('#selectProjectModalButton').click(function(){

			fillUpdateFields(correspProjects[selectedProjectIndex]);
			$('#showCorrespProjectsModal').modal('hide');
		});
	*/

});