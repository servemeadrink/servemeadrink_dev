<?php
	
	//On détruit tout  les cookie
	if( isset($_COOKIE['co_stay']) )
	{
		setcookie("co_stay", false, time()-1, '/');
		setcookie("u_id", false, time()-1, '/');
		setcookie("u_firstname", false, time()-1, '/');
		setcookie("u_lastname", false, time()-1, '/');
		setcookie("u_mail", false, time()-1);
		setcookie("u_password", false, time()-1, '/');
		setcookie("u_company", false, time()-1, '/');
	}
	
	//On détruit la Session
	if( isset($_SESSION['u_id']) )
	{
		session_destroy();
	}
	
	//On redirige l'internaute vers la page d'accueil
	header('Location: index.php');

?>