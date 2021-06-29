$(document).ready(function(){

		searchNav = $('#searchNav');

	// AUTOCOMPLETION
	searchNav.on('keyup',function(){

		//VIDE LES RECHERCHES A CHAQUE NOUVELLE ENTREE
		$('#autocompletion').empty();

		//SI L'INPUT SEARCH EST DIFFERENT DE VIDE EFFECTUER UNE RECHERCHE DANS LA BDD 
		//ET PRESENTER LES 5 PREMIERES REQUETES CORRESPONDANTES
		if(searchNav.val() !== ""){

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
});