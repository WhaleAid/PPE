<?php
session_start();
$errmsg_arr = array();
$errflag = false;
// configuration
$dbhost = "localhost";
$dbname = "gsb_frais";
$dbuser = "root";
$dbpass = "root";
  $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
  	$prenom = $_POST['prenom'];
		$nom = $_POST['nom'];
		$identifiant = $_POST['identifiant'];
		$mdp = $_POST['mdp'];
    $chars = '0123456789abcdefghijklmnopqrstuvwxyz';
    $id = substr(str_shuffle($chars), 0, 3);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO visiteur (id, nom, prenom, login, mdp) VALUES ('$id', '$nom', '$prenom', '$identifiant', '$mdp')";
  // use exec() because no results are returned
  $conn->exec($sql);
  header('location: done.php');
  exit();
?>