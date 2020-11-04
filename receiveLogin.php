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
  $email = preg_replace('/(<br>)+$/','',$arr[0]);
  $userPass = preg_replace('/(<br>)+$/','',$arr[1]);
  include('../php/dbConnection.php');
  
  echo $email."<br>".$userPass;
  //Query to DB
  $sql = "SELECT * FROM user WHERE userEmail = '$email' AND userPass = '$userPass'";
  $result = mysqli_query($connection,$sql) or die(mysqli_error($connection));
  $count = mysqli_num_rows($result);
  if($count == 1){
  	while($row=mysqli_fetch_assoc($result)){
  		$dbusername = $row['userEmail'];
  		$dbpass = $row['userPass'];
  		
  		
  	}
  if($email == $dbusername && $userPass == $dbpass){
  	$_SESSION['login_user'] = $email;
  	$_SESSION['login_pass'] = $userPass;
  	echo "You've logged in!";
  	}
  }else{
  	echo "failed";
  }
};  
	
  

$channel->basic_consume('hello', '', false, true, false, false, $callback);



while ($channel->is_consuming()) {
	$channel->wait();
}

?>
