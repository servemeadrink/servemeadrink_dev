<?php

/********************* Connexion à la base de données *********************/

	try{
		$options = array(
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // Charset à utf-8 
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //Gestion des erreurs
			PDO::ATTR_PERSISTENT => false
			);
		// Initialisation de la connexion (type de bdd, pseudo, mot de passe, options)
		
	} 
	catch ( Exception $e ) 
	{
		echo "Connexion à MySQL impossible : ", $e->getMessage();
		die();
	}
	
/********************* Sécurisation de la session *********************/

	function secure_session_start($name){
		session_name($name);
		session_start();
		
		$secur = $_SERVER['HTTP_USER_AGENT'];
		
		if(!isset($_SESSION['ME_SECU'])){
			$_SESSION['ME_SECU'] = $secur;
			
			return true;
		}
		else
		{
			if($_SESSION['ME_SECU'] != $secur){
				session_regenerate_id();
				$_SESSION = array();
				
				die("Error : La session semble corrompue.");
			}
			else
			{
				return true;
			}
		}
	}
	
?>