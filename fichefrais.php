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
$sql = "SELECT * FROM visiteur WHERE login=? ";
	$result = $conn->prepare($sql);
	$result->bindParam(1, $user);
	$result->execute(); 

	$rows = $result->fetch();
	$id = $rows['id'];
	$mois = $_POST['mois'];
	$repasMidi = $_POST['repasmidi'];
	$nuite = $_POST['nuite'];
	$etape = $_POST['etape'];
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  	$req = "INSERT INTO lignefraisforfait (idVisiteur, mois, idFraisForfait, quantite) VALUES ('$id', '$mois', '$repasMidi', '$nuite', '$etape')";
	$conn->exec($req);
?>