<?php
session_start();
$errmsg_arr = array();
$errflag = false;
// configuration
$dbhost = "localhost";
$dbname = "gsb_frais";
$dbuser = "root";
$dbpass = "root";
// database connection
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
// new data
$user = $_POST['identifiant'];
$password = $_POST['pwd'];
if($user == '') {
$errmsg_arr[] = 'Vous devez mettre votre identifiant';
$errflag = true;
}
if($password == '') {
$errmsg_arr[] = 'Vous devez mettre votre mot de passe';
$errflag = true;
}
// query
$result = $conn->prepare("SELECT * FROM visiteur WHERE login= :abab AND mdp= :asas");
$result->bindParam(':abab', $user);
$result->bindParam(':asas', $password);
$result->execute();
$rows = $result->fetch(PDO::FETCH_NUM);
if($rows > 0) {
header("location: home.php");
}
else{
$errmsg_arr[] = 'identifiant et mot de passe non trouvés';
$errflag = true;
}
if($errflag) {
$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
session_write_close();
header("location: login.php");
exit();
}
?>