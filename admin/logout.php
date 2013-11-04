<?php
session_start();
include("../config.php");
$hash[] = sha1("$pass");

if(in_array($_SESSION['f_password'],$hash)){
	$_SESSION['f_password'] = "";
	$_SESSION["f_attempts"] = 0;
	$_SESSION["f_session_expires"] = 0;
	setcookie("f_password","", time()+3600*24*3,'/');
}
header("Location: index.php");
?> 