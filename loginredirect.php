<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;



$conn = new AMQPStreamConnection('172.27.171.120', 5672, 'admin', 'admin');
$channel = $conn->channel();

$channel->queue_declare('hello', false, false, false, false);
$x = "";
echo " [*] Waiting for messages. To exit press CTRL+C\n";
$callback = function ($msg) {
echo ' [x] Received ', $msg->body, "\n";
  $x = $msg->body;
  
  if ( $x == "y") {
  	header("location: ../pages/dashboard.html");
  } else {
  	header("location: ../pages/error.html");
  }
};  
	
  
$channel->basic_consume('hello', '', false, true, false, false, $callback);


while ($channel->is_consuming()) {
	$channel->wait();
}

?>
  
