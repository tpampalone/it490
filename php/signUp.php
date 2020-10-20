<?php

session_start();
include 'dbConnection.php';




if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	$first = $_POST['first'];
	$last = $_POST['last'];
	$email = $_POST['email'];
	$userPass = $_POST['password'];
	$school = $_POST['school'];
	
	
	
	
	$sql = "INSERT INTO user (firstName,lastName,userEmail,userPass,userSchool) VALUES ('$first','$last','$email','$userPass','$school')";
	
	$result = mysqli_query($connection,$sql);
	if($result){
		echo "Yes";
	}else{
		echo "No";
	}
	$_SESSION['first'] = $first;
	$_SESSION['last'] = $last;
	$_SESSION['email'] = $email;
	$_SESSION['pass'] = $userPass;
	$_SESSION['school'] = $school;
	header("Location: ../rabbitmq/registered.php");
}


?>
