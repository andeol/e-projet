$(document).ready(function(){

	var nb_activities = 1;
	var nb_objectifs = 1;
	var nb_resultats = 1;
	var nb_indicateurs = 1;
	var nb_risques = 1;

	// everytime the user put a ";" character, the format of the textarea is changed
	$('#proj_obj').keyup(function(touche){
		
		var appui = touche.which || touche.keyCode;
		if (appui == 59 || appui == 13){
			var obj_content = $(this).html();
			var obj_tab = obj_content.split(";")
			var obj_content = "";
			for (var i = 0; i < obj_tab.length; i++){
				obj_content += '<a href="#">'+obj_tab[i]+'</a>';
			}
			alert(obj_content);
			$(this).val(obj_content);
		}
		
	});

	$('#addActivityButton').click(function(){
		addActivityLine();
	});

	var addActivityLine = function(){
		$('#table_activities_body').append('<tr>\
		<th scope = "row">1</th>\
		<td><input type = "text" class = "form-control"/></td>\
		<td><input type = "text" class = "form-control"/></td>\
		<td><input type = "text" class = "form-control"/></td>\
		</tr>');
	};

	$('#addObjectifButton').click(function(e){
		e.preventDefault();
		addObjectifInput();
	});

	var addObjectifInput = function(){

		//if (document.getElementById('#objectif_'+(nb_objectifs+1))){
		if ($('#objectif_'+(nb_objectifs+1)) == null ){
			alert('#objectif_'+(nb_objectifs+1));
			$('#objectif_'+(nb_objectifs+1)).css('visibility', 'visible');
		}
		else{

			$('#table_description_body').append('<tr>\
			<td><input id = "objectif_'+(++nb_objectifs)+'" type = "text" class = "form-control" /></td>\
			<td><input id = "resultat_'+(++nb_resultats)+'" type = "text" class = "form-control" style="visibility:hidden;" /></td>\
			<td><input id = "indicateurs_'+(++nb_indicateurs)+'" type = "text" class = "form-control" style="visibility:hidden;" /></td>\
			<td><input id = "risque_'+(++nb_risques)+'" type = "text" class = "form-control" style="visibility:hidden;" /></td>\
			</tr>');

		}
	};

	$('#addResultatButton').click(function(e){
		e.preventDefault();
		addResultatInput();
	});

	var addResultatInput = function(){

		//if (document.getElementById('#objectif_'+(nb_objectifs+1))){
		if ($('#resultat_'+(nb_resultats+1)) == null ){
			alert('#resultat_'+(nb_resultats+1));
			$('#resultat_'+(nb_resultats+1)).css('visibility', 'visible');
		}
		else{

			$('#table_description_body').append('<tr>\
			<td><input id = "objectif_'+(++nb_objectifs)+'" type = "text" class = "form-control" style="visibility:hidden;" /></td>\
			<td><input id = "resultat_'+(++nb_resultats)+'" type = "text" class = "form-control" /></td>\
			<td><input id = "indicateurs_'+(++nb_indicateurs)+'" type = "text" class = "form-control" style="visibility:hidden;" /></td>\
			<td><input id = "risque_'+(++nb_risques)+'" type = "text" class = "form-control" style="visibility:hidden;" /></td>\
			</tr>');

		}
	};

});