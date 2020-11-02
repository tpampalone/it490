<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	$first = $_POST['first'];
	$last = $_POST['last'];
	$email = $_POST['email'];
	$userPass = $_POST['password'];
	$school = $_POST['school'];

	$_SESSION['first'] = $first;
	$_SESSION['last'] = $last;
	$_SESSION['email'] = $email;
	$_SESSION['password'] = $userPass;
	$_SESSION['school'] = $school;
	
	header("location: registered.php");
	
	
}


?>
