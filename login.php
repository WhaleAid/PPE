<?php
session_start();
?>
<?php
if( isset($_SESSION['ERRMSG_ARR']) &&
is_array($_SESSION['ERRMSG_ARR']) &&
count($_SESSION['ERRMSG_ARR']) >0 ) {
echo '<ul style="padding:0; color:red;">';
foreach($_SESSION['ERRMSG_ARR'] as $msg) {
echo '<li>',$msg,'</li>';
}
echo '</ul>';
unset($_SESSION['ERRMSG_ARR']);
}
?>
<head>
  <link rel="stylesheet" href="log-in.css">
</head> 
<body>
		
		<form class="login-form" method="POST" action="login_query.php">
			<img src="logo.png">
			<h1>Connection</h1>
					<input type="text" name="identifiant" placeholder="Identifiant"/>
					<input type="password" name="pwd" placeholder="Mot De Passe"/>
					<input name="login" type = "submit" value = "Valider"></a>
					<a href="signup.php" class="login-forgot-pass">Créer Un Compte</a><br><br>
					<a href="recover.php" class="login-forgot-pass">Mot de passe oublié</a>
		</form>
	</body>