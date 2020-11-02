<?php
session_start();
//Include conn file

if($_SERVER["REQUEST_METHOD"] == "POST"){
	//username and pass sent from form
	$username = $_POST['email'];
	$password = $_POST['password'];
	
	$_SESSION['login_user'] = $username;
	$_SESSION['login_pass'] = $password;	
	header("location: welcome.php");
}



?>
