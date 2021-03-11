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
								<h4>Bonjour, <?php echo $_SESSION['USER']; ?></h4>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<nav class="main-menu">
				<ol class="menu">
					<li class="menu-item-normal"><a href="home.php">Saisie FicheFrais</a></li>
					<li class="menu-item-normal"><a href="home-ligne.php">Saisie ligne Frais</a></li>
                    <li class="menu-item-active"><a href="home-horsforfait.php">Saisie Frais Hors Forfait</a></li>
                    <li class="menu-item-normal"><a href="consulterfrais.php">Consulter Frais</a></li>
				</ol>
			</nav>
			<div class="col-md-8">
				<div class="card mb-3">
					<div class="card-body">
						<div class="row">
                        <div class="titre">
								<h1>SAISIE DE FRAIS HORS FORFAIT</h1>
							</div>
							<form method="POST" action="horsforfait.php">
								<table> 
                                <tr>
										<td>Mois : </td>
										<td><select name="mois" >
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
									<tr>
										<td>Libelle : </td>
										<td><input class="inputs" type="text" name="libelle"></td>
									</tr>
										<td>Date : </td>
										<td><input class="inputs" type="date" name="date"></td>
                                    </tr>
                                    <tr>
										<td>Montant : </td>
										<td><input class="inputs" type="text" name="mtn"></td>
									</tr>
									<tr>
										<td colspan="2"><input name="login" type="submit" value="Valider"></a></td>
                                    </tr>
								</table>
								</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<button class="deco"><a href="logout.php">Déconnection</a></button>
	</div>
</body>

</html>