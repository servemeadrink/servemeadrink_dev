<doctype html>

<head>
	<meta charset="UTF-8">
	<title></title>
	<script src="ressources/jquery-2.1.1.min.js"></script>
</head>

<body>
	<a href="index.php?url=deconnexion">Déconnectez-vous</a>
	<h1>Deuxième page d'accueil</h1>
	
	<?php
	
		echo'<h2>Print_r _SESSION</h2>';
		
		echo('<pre>');
		print_r($_SESSION);
		echo('</pre>');
		
		echo'<h2>Print_r _COOKIE</h2>';
		
		echo('<pre>');
		print_r($_COOKIE);
		echo('</pre>');
	
	?>
	
</body>

</html>