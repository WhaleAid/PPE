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
			<h1 class="login-text">Connection</h1>
					<input type="text" name="identifiant" placeholder="Identifiant"  class="login-username"/>
					<input type="password" name="pwd" placeholder="Mot De Passe" class="login-password"/>
					<input name="login" type = "submit" value = "login" class="login-submit"></a>
		</form>
				<a href="signup.php" class="login-forgot-pass">Créer Un Compte</a>
				<div class="underlay-photo"></div>
				<div class="underlay-black"></div> 
	</body>