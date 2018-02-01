$(document).ready(function(){

	var correspProjectsIndex = 1;
	var nbProjectsPerPage = 5;
	var correspProjects;
	var limitIndex = 0;
	var nbPages = 0;
	var pageIndex = 0;
	var formerPageIndex = 0;

	// Launching the search for a project that fits the criteria
	$('#searchProjectButton').click(function(e){
		e.preventDefault();
		
		/*
		alert('http://'+parameters.ROOT_DIR+"searchProject?ajax=true&searchProjCode="
							+$('#searchProjCode').val()+"&searchChefProjet="
							+$('#searchChefProjet').val()+"&sourceFinancement="
							+$('#srcFinInput').val()+"&searchDebutPeriode="
							+$('#searchDebutPeriode').val()+"&searchFinPeriode="
							+$('#searchFinPeriode').val()+"&searchMinCost="
							+($('#searchMinCost').val() == '' ? "0" : $('#searchMinCost').val())+"&searchMaxCost="
							+($('#searchMaxCost').val() == '' ? "0" : $('#searchMinCost').val()));
		*/

		// an ajax request

		$.ajax({

			url			: 'http://'+parameters.ROOT_DIR+"searchProject?ajax=true&searchProjCode="
							+$('#searchProjCode').val()+"&searchChefProjet="
							+$('#searchChefProjet').val()+"&sourceFinancement="
							+$('#srcFinInput').val()+"&searchDebutPeriode="
							+$('#searchDebutPeriode').val()+"&searchFinPeriode="
							+$('#searchFinPeriode').val()+"&searchMinCost="
							+($('#searchMinCost').val() == '' ? "0" : $('#searchMinCost').val())+"&searchMaxCost="
							+($('#searchMaxCost').val() == '' ? "0" : $('#searchMinCost').val()), 
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

	var showCorrespProjects = function(){

		//alert(pageIndex);
		//setting key variables for the currrent function
		correspProjectsIndex = (pageIndex * nbProjectsPerPage);
		limitIndex = (((correspProjects.length - correspProjectsIndex) > nbProjectsPerPage) ? nbProjectsPerPage * (pageIndex+1) : correspProjects.length);

		// i set the content of the table body to empty content
		$('#correspProjectsTableBody').text('');

		// first filling the table with the response of the ajax request
		while(correspProjectsIndex < limitIndex){
			//alert(nbPages);
			$('#correspProjectsTableBody').append('<tr>\
			      <th scope="row">'+correspProjectsIndex+'</th>\
			      <td>'+correspProjects[correspProjectsIndex][2]+'</td>\
			      <td>'+correspProjects[correspProjectsIndex][4]+'</td>\
			      <td>'+correspProjects[correspProjectsIndex][5]+'</td>\
			      <td>'+getDateFrFormat(correspProjects[correspProjectsIndex][6])+'</td>\
			      <td><a href="http://'+parameters.ROOT_DIR+'updateProject?projectId='+correspProjects[correspProjectsIndex][0]+'">Afficher</a></td>\
			    </tr>');
			correspProjectsIndex++;
		}
		//alert(nbPages);
	};

	var handleSearchProjectResponse = function(response){
		switch (response.length){
			case 0:
				//show a message to the user
				alert("No project found ! ");
				break;

			default:

				correspProjects = response;
				pageIndex = 0;
				formerPageIndex = pageIndex;

				nbPages = Math.ceil(response.length/nbProjectsPerPage);
				correspProjectsIndex = 0;
				limitIndex = (((response.length - correspProjectsIndex) > nbProjectsPerPage) ? nbProjectsPerPage : response.length);
			
				// show a table featuring all the projects corresponding to the criteria
				showCorrespProjects();

				$('#projectsPageNavContentHolder').text('');

				if (nbPages > 1 ){

					// filling the page navigation component
					$('#projectsPageNavContentHolder').append('<li style = "visibility: hidden;" class="page-item">\
					      <a id ="prevPageLink" class="page-link" href="#" aria-label="Previous">\
					        <span aria-hidden="true">&laquo;</span>\
					        <span class="sr-only">Previous</span>\
					      </a>\
					    </li>');

					for (var i = 0; i < nbPages; i++){
						$('#projectsPageNavContentHolder').append('<li id = "main-page-item-'+i+'" class="page-item '+((i==0) ? 'active' : '')+'"><a class="page-link main-page-link" href="#">'+(i+1)+'</a></li>');
					}

					$('#projectsPageNavContentHolder').append('<li class="page-item">\
					      <a id = "nextPageLink" class="page-link" href="#" aria-label="Next">\
					        <span aria-hidden="true">&raquo;</span>\
					        <span class="sr-only">Next</span>\
					      </a>\
					    </li>');

					$('#projectsPageNav').css('visibility', 'visible');

				}
		}
	};

	// add event click function on dynamically created html elements
	$('#projectsPageNav').on('click', 'a.main-page-link', function(e){

		e.preventDefault();
		pageIndex = $(this).text();
		pageIndex--;
		showCorrespProjects();

		$('#main-page-item-'+formerPageIndex).removeClass('active');
		$('#main-page-item-'+pageIndex).addClass('active');

		if (pageIndex != 0)
			$('a#prevPageLink').css('visibility', 'visible');
		else
			$('a#prevPageLink').css('visibility', 'hidden');	

		if (pageIndex != nbPages-1)
			$('a#nextPageLink').css('visibility', 'visible');
		else
			$('a#nextPageLink').css('visibility', 'hidden');	

		formerPageIndex = pageIndex;
	});

	$('#projectsPageNav').on('click', 'a#nextPageLink', function(e){
		e.preventDefault();
		pageIndex++;
		showCorrespProjects();

		$('#main-page-item-'+formerPageIndex).removeClass('active');
		$('#main-page-item-'+pageIndex).addClass('active');

		if (pageIndex == nbPages-1){
			$(this).css('visibility', 'hidden');
		}
		
		if (pageIndex != 0)
			$('a#prevPageLink').css('visibility', 'visible');

		if (pageIndex != nbPages-1)
			$('a#nextPageLink').css('visibility', 'hidden');

		formerPageIndex = pageIndex;
	});

	$('#projectsPageNav').on('click', 'a#prevPageLink', function(e){
		e.preventDefault();
		pageIndex--;
		showCorrespProjects();

		$('#main-page-item-'+formerPageIndex).removeClass('active');
		$('#main-page-item-'+pageIndex).addClass('active');

		if (pageIndex == 0){
			$(this).css('visibility', 'hidden');
		}
		
		if (pageIndex != nbPages-1)
			$('a#nextPageLink').css('visibility', 'visible');

		formerPageIndex = pageIndex;
	});

	// Javascript equivalent of the php function "getDateFrFormat" designed in config/Functions.php
	var getDateFrFormat = function(date){
		date = date.split("-");
		return date[2]+"/"+date[1]+"/"+date[0];
	};

	// Resetting all the search fields everytime the button is clicked
	$('#resetFieldsButton').click(function(e){

		$('#searchProjCode option:first').prop('selected', 'true');
		$('#searchChefProjet option:first').prop('selected', 'true');
		$('#srcFinInput option:first').prop('selected', 'true');

		$('#searchMinCost').val(0);
		$('#searchMaxCost').val(0);
		$('#searchDebutPeriode').val('');
		$('#searchFinPeriode').val('');
		
	});

});