<?php

include('../php/dbConnection.php');
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

//Query to DB

$sql = "SELECT message FROM test";

$result = $connection->query($sql);

if($result->num_rows>0){
	//output data for each row
	while($row = $result->fetch_assoc()){
		echo "Message: " . $row["message"];
		$message = $row["message"];
		$connection = new AMQPStreamConnection('localhost', 5672, 'admin', 'admin');
		$channel = $connection->channel();
		$channel->queue_declare('hello', false, false, false, false);
		$msg = new AMQPMessage($message,'hello');
		$channel->basic_publish($msg,'','hello');
		echo "DB Message has been sent'\n";
		
		
	}
	}else {
		echo "No results found.";
	}




$connection->close();

?>
