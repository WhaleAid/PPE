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
    $email = $_POST['email'];
		$mdp = $_POST['mdp'];
    $adresse = $_POST['adresse'];
    $cp = $_POST['cp'];
    $ville = $_POST['ville'];
    $chars = '0123456789abcdefghijklmnopqrstuvwxyz';
    $id = substr(str_shuffle($chars), 0, 3);
// Hashing
    $pass = password_hash($mdp, PASSWORD_DEFAULT);

  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO visiteur (id, nom, prenom, login, email, mdp, adresse, cp, ville, dateEmbauche) VALUES ('$id', '$nom', '$prenom', '$identifiant', '$email', '$pass', '$adresse', '$cp', '$ville', curdate())";
  // use exec() because no results are returned
  $conn->exec($sql);
  header('location: done.php');
  exit();
?>