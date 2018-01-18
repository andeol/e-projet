$(document).ready(function(){

	var correspProjectsIndex = 1;

	// Launching the search for a project that fits the criteria
	$('#searchProjectButton').click(function(e){
		e.preventDefault();

		/*
		alert('http://'+parameters.ROOT_DIR+"searchProject?ajax=true&searchProjCode="
							+$('#searchProjCode').val()+"&searchChefProjet="
							+$('#searchChefProjet').val()+"&searchDateDemarrage="
							+$('#searchDateDemarrage').val()+"&sourceFinancement="
							+$('#srcFinInput').val());
		*/

		// an ajax request
		$.ajax({

			url			: 'http://'+parameters.ROOT_DIR+"searchProject?ajax=true&searchProjCode="
							+$('#searchProjCode').val()+"&searchChefProjet="
							+$('#searchChefProjet').val()+"&searchDateDemarrage="
							+$('#searchDateDemarrage').val()+"&sourceFinancement="
							+$('#srcFinInput').val(), 
			type 		: "GET", 
			dataType	: "json",

			success 	: function(response, status){
							if (response != null){
								handleSearchProjectResponse(response);
							}
							else
								alert("No project found ! ");
			},

			error 		: function(response, status, error){
							alert("error");
			},

			complete	: function(response, status){
							//alert("complete");
			}

		});
	});

	var showCorrespProjects = function(projects){

		// i set the content of the table body to empty content
		$('#correspProjectsTableBody').text('');
		correspProjectsIndex = 1;
		//alert(projects[0]);

		// first filling the table with the response of the ajax request
		for (var i = 0; i < projects.length; i++){
			$('#correspProjectsTableBody').append('<tr>\
			      <th scope="row">'+correspProjectsIndex+'</th>\
			      <td>'+projects[i][1]+'</td>\
			      <td>'+projects[i][2]+'</td>\
			      <td>'+projects[i][3]+'</td>\
			      <td>'+projects[i][4]+'</td>\
			      <td>'+projects[i][5]+'</td>\
			      <td><a href="http://'+parameters.ROOT_DIR+'updateProject?projectId='+projects[0][0]+'">Afficher</a></td>\
			    </tr>');
			correspProjectsIndex++;
		}
		// and after that, showing the result
		//$('#showCorrespProjectsModal').modal('show');
	};


	var handleSearchProjectResponse = function(response){
		//alert('yes')
		switch (response.length){
			case 0:
				//show a message to the user
				alert("No project found ! ");
				break;

			default:
				// show a table featuring all the projects corresponding to the criteria
				showCorrespProjects(response);
		}
	};
});