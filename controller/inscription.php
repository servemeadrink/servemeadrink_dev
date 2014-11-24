<?php	
	//Inclut le fichier de configurations
	include('../config/config.php');
	
	//Démarre la session sécurisée
	secure_session_start("smad");
	
	include('../model/inscription.php');

	//On encode en json les résultats de la requête afin de récupérer l'erreur et l'afficher
	
	if( isset($data) )
	{
		echo json_encode($data);
	}

?>