<?php
session_start();
$errmsg_arr = array();
$errflag = false;
// configuration
$dbhost = "localhost";
$dbname = "gsb_frais";
$dbuser = "root";
$dbpass = "root";

if (match_found_in_database()) {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username; // $username coming from the form, such as $_POST['username']
                                       // something like this is optional, of course
}

<link href='log-in.css' rel='stylesheet' type='text/css'>
<div style="text-align:center;margin-top:50px;fontfamily:arial;font-size:20px;">
<h1 class="logged-text">Vous Avez Réussi à Vous Authentifier</h1><br>
<h2 class="logged-text2">GSB<h2>
<div class="underlay-photo"></div>
<div class="underlay-black"></div> 
</div>
?>