<?php
session_start();

include '../rabbitmq/rabbitSignUp.php';
require_once __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
$connection = new AMQPStreamConnection('172.27.184.80', 5672, 'admin', 'admin');
$channel = $connection->channel();
$channel->queue_declare('hello', false, false, false, false);

$msg = new AMQPMessage($_SESSION['email']);
$channel->basic_publish($msg, '', 'hello');
echo "<br>";
echo "Sent to RabbitMQ: ";
echo $msg->body;
echo "<br>";
$channel->close();
$connection->close();
?>
