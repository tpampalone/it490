<?php
session_start();

include 'rabbitmqLogin.php';
require_once __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
$credentials = $_SESSION['login_user'] + $_SESSION['login_pass'];
$connection = new AMQPStreamConnection('172.27.184.80', 5672, 'admin', 'admin');
$channel = $connection->channel();
$channel->queue_declare('hello', false, false, false, false);
$msg = new AMQPMessage($_SESSION['login_user']);
$channel->basic_publish($msg, '', 'hello');
echo "<br>";
echo "Sent to RabbitMQ: ";
echo $msg->body;
$msgPass = new AMQPMessage($_SESSION['login_pass']);
$channel->basic_publish($msgPass, '', 'hello');
echo "<br>";
echo "Pass to RabbitMQ: ";
echo $msgPass->body;
$connection->close();

?>
