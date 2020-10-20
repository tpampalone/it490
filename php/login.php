<?php
session_start();
//Include conn file
include("dbConnection.php");


if($_SERVER["REQUEST_METHOD"] == "POST"){
	//username and pass sent from form
	$username = $_POST['email'];
	$password = $_POST['password'];
	
	
	$sql = "SELECT * FROM `user` WHERE userEmail = '$username' AND userPass = '$password'";
	
	$result = mysqli_query($connection,$sql) or die(mysqli_error($connection));
	$count = mysqli_num_rows($result);
	
	//If matched, row must be 1
	if($count == 1){
		while($row=mysqli_fetch_assoc($result)){
			$dbusername = $row['userEmail'];
			$dbpassword = $row['userPass'];
		}
		if($username == $dbusername && $password == $dbpassword){
			$_SESSION['login_user'] = $username;
			$_SESSION['login_pass'] = $password;	
			header("location: ../rabbitmq/welcome.php");
		}
		
		
	}
}





?>
