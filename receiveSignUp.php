<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;



$conn = new AMQPStreamConnection('172.27.184.80', 5672, 'admin', 'admin');
$channel = $conn->channel();

$channel->queue_declare('hello', false, false, false, false);
$x = "";
echo " [*] Waiting for messages. To exit press CTRL+C\n";
$callback = function ($msg) {
  echo ' [x] Received ', $msg->body, "\n";
  $x = $msg->body;
  $arr = explode(" ", $x);
  $first = preg_replace('/(<br>)+$/','',$arr[0]);
  $last = preg_replace('/(<br>)+$/','',$arr[1]);
  $email = preg_replace('/(<br>)+$/','',$arr[2]);
  $password = preg_replace('/(<br>)+$/','',$arr[3]);
  $school = preg_replace('/(<br>)+$/','',$arr[4]);
  
 
  include('../php/dbConnection.php');
  
  
  //Query to DB
  $sql = "INSERT INTO user (firstName,lastName,userEmail,userPass,userSchool) VALUES('$first','$last','$email','$password','$school')";
  
  $result = mysqli_query($connection,$sql);
  if($result){
  	echo "Registration Successful!";
  }else{
  	echo "Registration Failed".mysqli_connect_error();
  }
};  
	
  

$channel->basic_consume('hello', '', false, true, false, false, $callback);



while ($channel->is_consuming()) {
	$channel->wait();
}

?>
