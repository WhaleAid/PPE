<?php
session_start();
$user = $_SESSION['USER'];
$errmsg_arr = array();
$errflag = false;
// configuration
$dbhost = "localhost";
$dbname = "gsb_frais";
$dbuser = "root";
$dbpass = "root";
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

$sql1 = "SELECT * FROM visiteur WHERE login= ?";
	$result = $conn->prepare($sql1);
	$result->bindParam(1, $user);
	$result->execute();
	$rows = $result->fetch();

	$id = $rows['id'];
	$mois = $_POST['mois'];
  	$nbrjust = $_POST['nbjust'];
	$mtn = $_POST['mtnval'];
	$date = $_POST['datemodif'];
    $etat = $_POST['etat'];
  // set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO fichefrais (idVisiteur, mois, nbJustificatifs, montantValide, dateModif, idEtat) VALUES ('$id', '$mois', '$nbrjust', '$mtn', '$date', '$etat');
  		INSERT INTO fichefrais (idVisiteur, mois, nbJustificatifs, montantValide, dateModif, idEtat) VALUES ('$id', '$mois', '$nbrjust', '$mtn', '$date', '$etat');
  		INSERT INTO fichefrais (idVisiteur, mois, nbJustificatifs, montantValide, dateModif, idEtat) VALUES ('$id', '$mois', '$nbrjust', '$mtn', '$date', '$etat');
  		INSERT INTO fichefrais (idVisiteur, mois, nbJustificatifs, montantValide, dateModif, idEtat) VALUES ('$id', '$mois', '$nbrjust', '$mtn', '$date', '$etat');";
  $conn->exec($sql);
  header('location: home.php');
  exit();
?>