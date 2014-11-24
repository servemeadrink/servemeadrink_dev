<?php

if( isset($_POST['u_firstname']) )
{
	if( !empty($_POST['u_firstname']) && !empty($_POST['u_lastname']) && !empty($_POST['u_email']) && !empty($_POST['u_password']) && !empty($_POST['u_confirm']) )
	{
		if( isset($_POST['u_company']) )
		{
			// On sécurise les posts
			$firstname = $db -> quote($_POST['u_firstname']);
			$lastname = $db -> quote($_POST['u_lastname']);
			$mail = $db -> quote($_POST['u_email']);
			$password = $db -> quote(md5($_POST['u_password']));
			$confirm = $db -> quote(md5($_POST['u_confirm']));
			$company = $_POST['u_company'];
			
			// On vérifie si un compte associé au mail existe
			
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
			
			if( $verif_mail == 0 )
			{
				if( $password == $confirm )
				{
					// On préapare la requête
					
		
					$query = $db -> prepare(	"	INSERT
													INTO smad_user
													
													SET
													u_firstname = ".$firstname.",
													u_lastname = ".$lastname.",
													u_mail = ".$mail.",
													u_password = ".$password.",
													u_company = ".$company."
													
												");
					
					// On execute la requête
					$query->execute();
					
					//Redirection vers la page de gestion pour les particuliers
					
					if( $company == 0 )
					{
						$data = array(
						"ERROR" => 5
						);
					}
					
					//Redirection vers la page de gestion pour les entreprises
					
					if( $company == 1 )
					{
						$data = array(
						"ERROR" => 6
						);
					}
					
					
					
				}
				else
				{
					$data = array(
					"ERROR" => 4
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
			"ERROR" => 3
			);
		}
	}
	else
	{
		$data = array(
			"ERROR" => 1
		);
	}
	
}
	
?>