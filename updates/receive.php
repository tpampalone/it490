<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection('172.27.171.120', 5672, 'admin', 'admin');
$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false, false);

echo " [*] Waiting for messages. To exit press CTRL+C\n";



$callback = function($msg) {
	$value = $msg->body;
	echo $value."\n";
	$myFile = file_put_contents("testQuestions.txt",$value.PHP_EOL, FILE_APPEND | LOCK_EX);
	
};





$channel->basic_consume('hello', '', false, true, false, false, $callback);

while ($channel->is_consuming()) {
    $channel->wait();
    
}

?>
