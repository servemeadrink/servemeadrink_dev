//Le module ajax

//--------------------------------------- LORS DU SUBMIT, LA FONCTION AJAX -----------------------------------

$("#form_connexion").on("submit", function(e){
		e.preventDefault();
		
		$.ajax({
			
			//Url du traitement serveur
			url: "controller/connexion.php",
			
			//Type de requête
			type:'post',
			
			//Paramètre envoyés
			data: $(this).serialize(),
			
			//On précuse le type de flux
			dataType: 'json',
			
			//Traitement en cas de succès : on reçoit le flux dans data
			success: function(data){
				//Affiche l'objet transmis par l'ajax
				console.log(data);
				//Lance la fonction transférer flux
				traiterFluxConnexion(data);
			},
			
			// Traitement en cas d'erreur : on reçoit le flux dans data
			error: function(jqXHR, textStatus, errorThrown){
				console.log("Erreur d'execution AJAX");
			}
			
		});

	});

//------------------- LA FONCTION TRAITER FLUX

function traiterFluxConnexion(flux){

var ERROR = '';

	switch( flux['ERROR'] ) {
		case 1:
			ERROR = 'Veuillez renseignez tous les champs.';
			break;
			
		case 2:
			ERROR = 'Le compte n\'existe pas.';
			break;
		
		case 3:
			ERROR = 'Le mot de passe est erroné.';
			break;
			
		case 4:
			//Redirige le particulier vers l'index2
			document.location.href="index.php?url=index2" 
			break;
		
		case 5:
			//Redirige l'entreprise vers la page de gestion
			document.location.href="index.php?url=gestion" 
			break;
	}
	
	affiche_error_connexion(ERROR);
}

//--------------------------- LA FONCTION AFFICHE ERROR

function affiche_error_connexion(ERROR){
	$("#msg_error_connexion").html(ERROR);
}