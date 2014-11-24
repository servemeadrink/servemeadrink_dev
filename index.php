<?php
	//Inclut le fichier de configurations
	include('config/config.php');
	
	//Démarre la session sécurisée
	secure_session_start("smad");
	
	//Si le parametre url et le cookie qui permet de maintenir la connexion n'existent pas on charge l'index
	if( !isset($_GET['url']) && !isset($_COOKIE['co_stay']) )
	{
		include('view/index.php');
	}
	
	//S'il existe un paramètre $url
	if( isset($_GET['url']) )
	{
		$url = $_GET['url'];
	}
	
	//Si le parametre url existe / Le cookie rester connecté, alors on inclut les différents controllers
	if( isset($url) OR isset($_COOKIE['co_stay']) )
	{		
		if( (isset($url) && $url == "index2") OR (isset($_COOKIE['u_company']) && $_COOKIE['u_company'] == 0) OR (isset($_SESSION['u_company']) && $_SESSION['u_company'] == 0) )
		{
			include('controller/index2.php');
		}
		
		if( (isset($url) && $url == "gestion") OR (isset($_COOKIE['u_company']) && $_COOKIE['u_company'] == 1) OR (isset($_SESSION['u_company']) && $_SESSION['u_company'] == 1) )
		{
			include('controller/gestion.php');
		}
		
		if( (isset($url) && $url == "deconnexion") )
		{
			include('controller/deconnexion.php');
		}
	}
	
?>