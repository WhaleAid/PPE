<?php
session_start();
$user = $_SESSION['USER'];?>
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
			<form method="POST" action="fichefrais.php">
			<table>
					<tr>
						<select placeholder="Mois" name="Mois">
						<option disabled selected value> -- Mois -- </option>
						<option value="Janvier">Janvier</option>
						<option value="Férvier">Férvier</option>
						<option value="Mars">Mars</option>
						<option value="Avril">Avril</option>
						<option value="Mai">Mai</option>
						<option value="Juin">Juin</option>
						<option value="Juillet">Juillet</option>
						<option value="Août">Août</option>
						<option value="Septembre">Septembre</option>
						<option value="Octobre">Octobre</option>
						<option value="Novembre">Novembre</option>
						<option value="Décembre">Décembre</option>
					</tr>
					<tr><input class="inputs" placeholder="Repas midi" type="text" name="repasmidi"></tr>
					<tr><input class="inputs" placeholder="Nuité" type="text" name="nuite"></tr>
					<tr><input class="inputs" placeholder="Etape" type="text" name="etape"></tr>
					
					<tr><input class="inputs" placeholder="Km" type="text" name="km"></tr>
					<tr><p class="radio-title" style="text-decoration: underline;">Situation</p></tr>
					<tr><label class="radio-label">Enregistré</label><input class="inputs" type="radio" name="situation" checked></tr>
					<tr><label class="radio-label">Remboursé</label><input class="inputs" type="radio" name="situation"></tr>
					<tr><label class="radio-label">Validé</label><input class="inputs" type="radio" name="situation"></tr>
		</div>
		</div>
	</body>
</html>