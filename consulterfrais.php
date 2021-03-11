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

$sqlid = "SELECT * FROM visiteur WHERE login= ?";
	$resultid = $conn->prepare($sqlid);
	$resultid ->bindParam(1, $user);
	$resultid ->execute();
	$rowid = $resultid->fetch();
    $id = $rowid['id'];

$sql1 = "SELECT libelle,quantite, montant, quantite*montant FROM `lignefraisforfait` JOIN fraisforfait on idFraisForfait = fraisforfait.id where idVisiteur='$id'";
	$result = $conn->prepare($sql1);
	$result->execute();
    $rows = $result->fetch();
    print_r($rows);

$sql2 = "SELECT date, libelle, montant FROM `lignefraishorsforfait` where idVisiteur='$id'";
	$resulthf = $conn->prepare($sql2);
	$resulthf->execute();
    $rowhf = $resulthf->fetch();
    print_r($rowhf);
?>
<!DOCTYPE html>
<html>
<head>
    <title>PROFIL</title>
    <link href='home.css' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
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
                    <li class="menu-item-normal"><a href="home-horsforfait.php">Saisie Frais Hors Forfait</a></li>
                    <li class="menu-item-active"><a href="consulterfrais.php">Consulter Frais</a></li>
                </ol>
            </nav>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="titre">
                                <h1>CONSULTATION DE FRAIS FORFAIT</h1>
                            </div>
                            <table class="fichetable">
                                <tr>
                                    <th>Frais Forfait</th>
                                    <th>Quantite</th>
                                    <th>Prix Unitaire</th>
                                    <th>Total</th>
                                </tr>
                                <?php
                                    echo "<tr><td class = 'libelle'>".$rows['libelle']."</td><td>".$rows['quantite']."</td><td>".$rows['montant']."</td><td>".$rows['quantite*montant']."</td></tr>";
                                while ($rows = $result->fetch()) {
                                    echo "<tr><td class = 'libelle'>".$rows['libelle']."</td><td>".$rows['quantite']."</td><td>".$rows['montant']."</td><td>".$rows['quantite*montant']."</td></tr>";
                                }
                                ?>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="titre">
                                <h1>CONSULTATION DE FRAIS HORS FORFAIT</h1>
                            </div>
                            <table class="fichetable">
                                <tr>
                                    <th>Date</th>
                                    <th>Libelle</th>
                                    <th>Montant</th>
                                </tr>
                                <?php
                                    echo "<tr><td>".$rowhf['date']."</td><td>".$rowhf['libelle']."</td><td>".$rowhf['montant']."</td></tr>";
                                while ($rowhf = $resulthf->fetch()) {
                                    echo "<tr><td>".$rowhf['libelle']."</td><td>".$rowhf['quantite']."</td><td>".$rowhf['montant']."</td></tr>";
                                }
                                ?>
                            </table>
                        </div>
                        
                    </div>
                </div>
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