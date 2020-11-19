<!DOCTYPE html>
<html>
	<head>
		<script src="https://www.google.com/recaptcha/api.js?render=6LfhzeQZAAAAAFt_wrE8Bh9ozp3THRsyrs9b7o8l"></script>
	</head>
	<body>
		<link href='log-in.css' rel='stylesheet' type='text/css'>
			<img class ="logo" src="logo.png">
		<form class="login-form2" action="register_query.php" method="POST">
			<h1>INSCRIPTION</h1>
				<input placeholder="Nom" type="text" name="nom" /><br>
				<input placeholder="Prenom" type="text" name="prenom"/><br>
				<input placeholder="Identifiant"  type="text" name="identifiant"/><br>
				<input placeholder="Email"  type="email" name="email"/><br>
				<input placeholder="Mot de Passe"  type="password" name="mdp"/><br>
				<input placeholder="Adresse"  type="text" name="adresse" /><br>
				<input placeholder="Code Postal"  type="text" name="cp"/><br>
				<input placeholder="Ville"  type="text" name="ville"/><br>
			 	<input name="register" type = "submit" value = "Valider"></a>
			 	<a href="login.php" class="login-forgot-pass"><div>Déjà membre? Connectez-vous</div></a>
			 </div>
		</form>
		<script>
  		grecaptcha.ready(function() {
     	grecaptcha.execute('put your site key here', {action: 'homepage'}).then(function(token) {
        // pass the token to the backend script for verification
      });
  });
  </script>
	</body>
</html>