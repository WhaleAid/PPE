<?php
session_start();
$errmsg_arr = array();
$errflag = false;
// configuration
$dbhost = "localhost";
$dbname = "gsb_frais";
$dbuser = "root";
$dbpass = "root";
try {
  $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
  		$prenom = $_POST['prenom'];
		$nom = $_POST['nom'];
		$identifiant = $_POST['identifiant'];
		$mdp = $_POST['mdp'];
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO visiteur (id, nom, prenom, login, mdp) VALUES ('f45', '$nom', '$prenom', '$identifiant', '$mdp')";
  // use exec() because no results are returned
  $conn->exec($sql);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
  header("location : done.php");
?>