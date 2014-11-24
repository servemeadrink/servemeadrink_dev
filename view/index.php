<!doctype html>

<head>
	<meta charset="UTF-8">
	<title></title>
	<script src="ressources/scripts/jquery-2.1.1.min.js"></script>
</head>

<body>

	<div id="content">
		
		<div id="bloc_test">
			<div class="inscription">
				<h3 style="text-align: center;">Inscription</h3>
				
				<div id="msg_error_inscription">
				
				</div>
				
				<form name="inscription" id="form_inscription" action="#" method="post">
					
					<input type="text" name="u_firstname" placeholder="Prénom" /><br /><br />
					<input type="text" name="u_lastname" placeholder="Nom" /><br /><br />
					<input type="email" name="u_email" placeholder="E-mail" /><br /><br />
					<input type="password" name="u_password" placeholder="Mot de Passe" /><br /><br />
					<input type="password" name="u_confirm" placeholder="Confirmer le Mot de Passe" /><br /><br />
					
					<label for="user">
						<input name="u_company" value="0" type="radio" id="user" style="visibility: hidden; width:0; height: 0;" />
						<img src="ressources/images/user2.png" id="user_img" />
					</label>
					
					<label for="company">
						<input name="u_company" value="1" type="radio" id="company" style="visibility: hidden; width:0; height: 0;" />
						<img src="ressources/images/entreprise2.png" id="company_img" />
					</label>
					
					<br />
					
					<div id="descript_choice"></div>
					
					<br /><br />
					
					<input type="submit" name="inscript" />
				</form>
			</div>
			
			<div class="connexion">
				
				<h3 style="text-align: center;">Connexion</h3>
				
				<div id="msg_error_connexion"></div>
				
				<form name="connexion" id="form_connexion" action="controller/connexion.php" method="post">
						
						<input type="email" name="co_email" placeholder="E-mail" /><br /><br />
						<input type="password" name="co_password" placeholder="Mot de Passe" /><br /><br />
						
						<label for="stay_connected">
							<input name="co_stay" type="checkbox" id="stay_connected" />
							Restez connecté.
						</label>
					
						<br />
						
						<input type="submit" name="connect" />
				</form>
			</div>
			
		</div>
		
			<div id="inscris">
				
				<h2>Rafraichir la page pour mettre a jour le tableau des inscris</h2>
					
				<?php
					
					$query = $db -> prepare(	"	SELECT *
													FROM smad_user
										");
			
					// On execute la requête
					$query->execute();
					
					// On récupère le résultat
					
					$result_users = $query->fetchAll(PDO::FETCH_ASSOC);
				
				?>
			
				<table style="border: 1px black solid;">
					
					<thead>
						<th>Identifiant</th>
						<th>Prénom</th>
						<th>Nom</th>
						<th>Mail</th>
						<th>Mot de passe</th>
						<th>Entreprise</th>
					</thead>
					
					<?php
						foreach( $result_users as $user)
						{
							echo'
							<tr>
								<td>'.$user['u_id'].'</td>
								<td>'.$user['u_firstname'].'</td>
								<td>'.$user['u_lastname'].'</td>
								<td>'.$user['u_mail'].'</td>
								<td>'.$user['u_password'].'</td>
								<td>'.$user['u_company'].'</td>
							</tr>
							';
						}
					?>
				</table>
			</div>
		
		
	</div>
		
		
		<script src="ressources/scripts/ajaxInscription.js">
			
			//On attend que jquery soit lancé
			(function ($) {
				$('#user_img').click(function(){
					$('#user_img').attr('src',"ressources/images/user.png");
					$('#company_img').attr('src',"ressources/images/entreprise2.png");
					$('#descript_choice').html("Vous êtes utilisateur");
				});
				
				$('#company_img').click(function(){
					$('#company_img').attr('src',"ressources/images/entreprise.png");
					$('#user_img').attr('src',"ressources/images/user2.png");
					$('#descript_choice').html("Vous êtes entrepreneur");
				});
			})(jQuery);
			
		</script>
		
		<script src="ressources/scripts/ajaxConnexion.js">
			
		</script>
		
		<style>
			img
			{
				cursor: pointer;
			}
			
			#bloc_test
			{
				width: 230px;
				float: left;
			}
			
			
			.inscription
			{
				width: 180px;
				padding: 10px;
				border: 1px black solid;
				float: left;
			}
			
			.connexion
			{
				width: 180px;
				padding: 10px;
				border: 1px black solid;
			}
			
			#inscris
			{
				float: left;
				padding-left: 10px;
			}
			
			thead
			{
				border: 1px black solid;
			}
			
			td
			{
				border: 1px black solid;
				padding: 5px;
				text-align: center;
			}
			
			#content
			{
				height: 650px;
			}
		</style>
	
	
	<div id="code">
		
		<?php
		
			$code = htmlspecialchars('
			<div id="inscription">
				<h3 style="text-align: center;">Inscription</h3>
				
				<div id="msg_error">
				
				</div>
				
				<form name="inscription" id="form_inscription" action="controller/inscription.php" method="post">
				
					<input type="text" name="u_firstname" placeholder="Prénom" />
					<input type="text" name="u_lastname" placeholder="Nom" />
					<input type="text" name="u_city" placeholder="Ville" />
					<input type="email" name="u_email" placeholder="E-mail" />
					<input type="password" name="u_password" placeholder="Mot de Passe" />
					<input type="password" name="u_confirm" placeholder="Confirmer le Mot de Passe" />
					
					<label for="user">
						<input name="u_nature" value="0" type="radio" id="user" style="visibility: hidden; width:0; height: 0;" />
						<img src="ressources/user2.png" id="user_img" />
					</label>
					
					<label for="company">
						<input name="u_nature" value="1" type="radio" id="company" style="visibility: hidden; width:0; height: 0;" />
						<img src="ressources/entreprise2.png" id="company_img" />
					</label>
					
					
					<div id="descript_choice"></div>
					
					
					<input type="submit" name="inscript" />
				</form>
			
			</div>
			');
			
			// echo'<pre>';
			// echo $code;
			// echo'</pre>';
		
		
		
		
		
		
		
		?>
	
	</div>
</body>