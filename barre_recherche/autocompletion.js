$(document).ready(function(){

	let searchHome = $('#searchHome'), 
		searchNav = $('#searchNav'),
		formSearch = $('#formSearch'), 
		autocompletion = $('#autocompletion');

	// AUTOCOMPLETION
	searchNav.on('keyup',function(){

		// console.log(searchNav.val());

		//VIDE LES RECHERCHES A CHAQUE NOUVELLE ENTREE
		$('#autocompletion').empty();

		//SI L'INPUT SEARCH EST DIFFERENT DE VIDE EFFECTUER UNE RECHERCHE DANS LA BDD 
		//ET PRESENTER LES 5 PREMIERES REQUETES CORRESPONDANTES
		if(searchNav.val() != ""){

			$.ajax({

				url : "autocompletionScript.php", 
				type : "POST", 
				data : "search=" + searchNav.val(),
				success : function(html){

					$('#autocompletion').prepend(html);
				},

				error : function(resultat,statut,erreur){
					console.log(resultat,statut,erreur);
				}
			});

		//SI L'INPUT SEARCH EST VIDE, VIDER LA PARTIE PROPOSANT DES REQUETES
		}else{

			$('#autocompletion').empty();
		}
	});


	$('form').submit(function(e){

		e.preventDefault();

		if($('input').val() != ""){

			$.ajax({

				url : "recherche.php?search="+$('input').val(), 
				type : "GET", 
				success : function(html){

					$(location).attr('href','recherche.php?search='+$('input').val());
				}, 
				error : function(resultat,statut,erreur){

					console.log(resultat,statut,erreur);
				}
			});
		}
		else{
			console.log("mensonge");
		}
	});
});