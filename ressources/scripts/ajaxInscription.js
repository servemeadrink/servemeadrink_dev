//Le module ajax

//--------------------------------------- LORS DU SUBMIT, LA FONCTION AJAX -----------------------------------

$("#form_inscription").on("submit", function(e){
		e.preventDefault();
		
		$.ajax({
			
			//Url du traitement serveur
			url: "controller/inscription.php",
			
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
				traiterFluxInscription(data);
			},
			
			// Traitement en cas d'erreur : on reçoit le flux dans data
			error: function(jqXHR, textStatus, errorThrown){
				console.log("Erreur d'execution AJAX");
			}
			
		});

	});

//------------------- LA FONCTION TRAITER FLUX

function traiterFluxInscription(flux){

var ERROR = '';

	switch( flux['ERROR'] ) {
		case 1:
			ERROR = 'Veuillez renseignez tous les champs.';
			break;
			
		case 2:
			ERROR = 'Un compte associé à ce mail existe déjà.';
			break;
		
		case 3:
			ERROR = 'Veuillez choisir la nature de votre compte.';
			break;
			
		case 4:
			ERROR = 'Le mot de passe doit être identtique dans les deux champs.';
			break;
			
		case 5:
			//Redirige le particulier vers l'index2
			document.location.href="index.php?url=index2" 
			break;
		
		case 6:
			//Redirige l'entreprise vers la page de gestion
			document.location.href="index.php?url=gestion" 
			break;
	}
	
	affiche_error_inscription(ERROR);
}

//--------------------------- LA FONCTION AFFICHE ERROR

function affiche_error_inscription(ERROR){
	$("#msg_error_inscription").html(ERROR);
}