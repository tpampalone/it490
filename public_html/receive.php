<?php


require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;



$conn = new AMQPStreamConnection('localhost', 5672, 'admin', 'admin');
$channel = $conn->channel();

$channel->queue_declare('hello', false, false, false, false);
$x = "";
echo " [*] Waiting for messages. To exit press CTRL+C\n";
$callback = function ($msg) {
  echo ' [x] Received ', $msg->body, "\n";
  $x = $msg->body;
  echo $x;
  $new = preg_replace('/(<br>)+$/','',$x);
  echo $new;
  include('../php/dbConnection.php');
  //Query to DB
  $sql = "INSERT INTO test (message) VALUES ('$new')";
  if (mysqli_query($connection, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
} ;  
	
  

$channel->basic_consume('hello', '', false, true, false, false, $callback);



while ($channel->is_consuming()) {
	$channel->wait();
}

?>
