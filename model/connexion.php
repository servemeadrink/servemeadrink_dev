<?php

	if( !empty($_POST['co_email']) && !empty($_POST['co_password']) )
	{
		// On sécurise les posts
		$mail = $db -> quote($_POST['co_email']);
		$password = md5($_POST['co_password']);
		
		// On vérifie si le compte associé au mail existe
				
		// On préapare la requête
			
		$query = $db -> prepare(	"	SELECT *
										FROM smad_user
										
										WHERE u_mail = ".$mail."
									");
		
		// On execute la requête
		$query->execute();
		
		// On récupère le résultat
		
		$result_account = $query->fetchAll(PDO::FETCH_ASSOC);
		
		// Vérification de l'existance du login
		
		$verif_mail = sizeof($result_account);
		
				
		if( $verif_mail == 1 )
		{
			if( $password == $result_account[0]['u_password'] )
			{
				// On sauvegarde toutes les valeurs de l'internaute en session
				$_SESSION['u_id'] = $result_account[0]['u_id'];
				$_SESSION['u_firstname'] = $result_account[0]['u_firstname'];
				$_SESSION['u_lastname'] = $result_account[0]['u_lastname'];
				$_SESSION['u_mail'] = $result_account[0]['u_mail'];
				$_SESSION['u_company'] = $result_account[0]['u_company'];
				
				//Si la personne veut rester connecter, on crée les cookie pour 1h
				if( isset($_POST['co_stay']) )
				{
					setcookie("co_stay", 1, time()+3600, '/');
					setcookie("u_id", $result_account[0]['u_id'], time()+3600, '/');
					setcookie("u_firstname", $result_account[0]['u_firstname'], time()+3600, '/');
					setcookie("u_lastname", $result_account[0]['u_lastname'], time()+3600, '/');
					setcookie("u_mail", $result_account[0]['u_mail'], time()+3600, '/');
					setcookie("u_company", $result_account[0]['u_company'], time()+3600, '/');
				}
				
				//On redirige le particulier vers l'index 2
				
				if( $_SESSION['u_company'] == 0 )
				{
					$data = array(
						"ERROR" => 4
					);
				}
				
				//On redirige l'entreprise vers la page de gestion
				
				if( $_SESSION['u_company'] == 1 )
				{
					$data = array(
						"ERROR" => 5
					);
				}
				
			}
			else
			{
				$data = array(
					"ERROR" => 3
				);
			}
		}
		else
		{
			$data = array(
					"ERROR" => 2
				);
		}
	}
	else
	{
		$data = array(
		"ERROR" => 1
		);
	}
	
?>