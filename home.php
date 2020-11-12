<?php
	session_start();
	$_SESSION['USER'];

?>
<!DOCTYPE html>
<html>
	<head>
		<title>PROFIL</title>
		<link href='log-in.css' rel='stylesheet' type='text/css'>
		<div class="profil">
			<img class="profile-img" src="pfp.png">
			<img class="logopfp" src="logo.png">
			<p>Bonjour, <?php echo $_SESSION['USER'];?></p>	
			
		</div>
	</head>
	<body>
		<div class="gestion-frais">
			<h1>SAISIE DE FRAIS</h1>
			<table>
					<tr>
						<select placeholder="Mois" name="Mois">
						<option disabled selected value> -- Mois -- </option>
						<option value="Janvier">Janvier</option>
						<option value="Janvier">Férvier</option>
						<option value="Janvier">Mars</option>
						<option value="Janvier">Avril</option>
						<option value="Janvier">Mai</option>
						<option value="Janvier">Juin</option>
						<option value="Janvier">Juillet</option>
						<option value="Janvier">Août</option>
						<option value="Janvier">Septembre</option>
						<option value="Janvier">Octobre</option>
						<option value="Janvier">Novembre</option>
						<option value="Janvier">Décembre</option>
					</tr>
					<tr><input class="inputs" placeholder="Repas midi" type="text" name="repasmidi"></tr>
					<tr><input class="inputs" placeholder="Nuité" type="text" name="nuite"></tr>
					<tr><input class="inputs" placeholder="Etape" type="text" name="etape"></tr>
					
					<tr><input class="inputs" placeholder="Km" type="text" name="km"></tr>
					<tr><p class="radio-title" style="text-decoration: underline;">Situation</p></tr>
					<tr><label class="radio-label">Enregistré</label><input class="inputs" type="radio" name="enregiste" checked></tr>
					<tr><label class="radio-label">Remboursé</label><input class="inputs" type="radio" name="rembourse"></tr>
					<tr><label class="radio-label">Validé</label><input class="inputs" type="radio" name="valide"></tr>
		</div>
		</div>
	</body>
</html>