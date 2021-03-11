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

// public function getFraisId(){
// 	$requetePrepare = pdoGsb::$monPdo->prepare(
// 		'SELECT fraisforfait.id as idfrais'
// 		'From fraisforfait ORDER BY fraisforfait.id'
// 	);
// 	$requetePrepare->execute()
// 	return $requestPrep->fetchAll();
// }

$sql1 = "SELECT * FROM visiteur WHERE login= ?";
	$result = $conn->prepare($sql1);
	$result->bindParam(1, $user);
	$result->execute();
	$rows = $result->fetch();

	$id = $rows['id'];
	$mois = $_POST['mois'];
  	$etape = $_POST['etape'];
	$km = $_POST['km'];
	$nuite = $_POST['nuite'];
  $repas = $_POST['repas'];
  // set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO lignefraisforfait (idVisiteur, mois, idFraisForfait, quantite) VALUES ('$id', '$mois', 'ETP', '$etape');
  		INSERT INTO lignefraisforfait (idVisiteur, mois, idFraisForfait, quantite) VALUES ('$id', '$mois', 'KM', '$km');
  		INSERT INTO lignefraisforfait (idVisiteur, mois, idFraisForfait, quantite) VALUES ('$id', '$mois', 'NUI', '$nuite');
  		INSERT INTO lignefraisforfait (idVisiteur, mois, idFraisForfait, quantite) VALUES ('$id', '$mois', 'REP', '$repas');";
  $conn->exec($sql);
  header('location: home-ligne.php');
  exit();
?>