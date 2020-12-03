<?php
session_start();
$user = $_SESSION['USER'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PROFIL</title>
		<link href='home.css' rel='stylesheet' type='text/css'>
	</head>
	<body>
		
		<div class="container">
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                    <img src="pfp.png" alt="Admin" class="rounded-circle" width="150">
                    <img src="logo.png" alt="Admin" class="rounded-circle-right" width="150">
                    <div class="mt-3">
                      <h4>Bonjour, <?php echo $_SESSION['USER'];?></h4>
                    </div>
                    <div class="titre">
                    	<h1>SAISIE DE FRAIS</h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <nav class="main-menu">
            <ol class="menu">
              <li class="menu-item"><a href="index.html">Saisie Frais</a></li>
              <li class="menu-item"><a href="javascript:void(0)">Consulter Frais</a></li>
              <li class="menu-item"><a href="#"></a></li>
            </ol>
          </nav>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
					<form method="POST" action="fichefrais.php">
					<table>
							<tr>
								<td>Mois : </td><td><select name="mois">
								<option disabled selected value> -- Mois -- </option>
								<option value="1">Janvier</option>
								<option value="2">Férvier</option>
								<option value="3">Mars</option>
								<option value="4">Avril</option>
								<option value="5">Mai</option>
								<option value="6">Juin</option>
								<option value="7">Juillet</option>
								<option value="8">Août</option>
								<option value="9">Septembre</option>
								<option value="10">Octobre</option>
								<option value="11">Novembre</option>
								<option value="12">Décembre</option>
							</tr></select></td>
							<tr><td>Forfait Etape : </td><td><input class="inputs" type="text" name="etape"></td></tr>
							<tr><td>Frais Kilométrique : </td><td><input class="inputs" type="text" name="km"></td></tr>
							<tr><td>Nuité Hotel: </td><td><input class="inputs" type="text" name="nuite"></td></tr>
							<tr><td>Repas Restaurant : </td><td><input class="inputs" type="text" name="repas"></td></tr>
							<tr><td><input name="login" type = "submit" value = "Valider"></a></td></tr>
							<!-- <tr><td><h3 class="radio-title" style="text-decoration: underline;">Situation</h3></td></tr>
							<tr><td><label class="radio-label">Enregistré</label><input class="inputs" type="radio" name="situation" checked></td></tr>
							<tr><td><label class="radio-label">Remboursé</label><input class="inputs" type="radio" name="situation"></td></tr>
							<tr><td><label class="radio-label">Validé</label><input class="inputs" type="radio" name="situation"></td></tr> -->
		</div>
              </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    
		</div>
	</body>
</html>