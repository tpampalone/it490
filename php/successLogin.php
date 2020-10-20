<?php
session_start();

include 'login.php';
require_once __DIR__ . '/vendor/autoload.php';



use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
$connection = new AMQPStreamConnection('localhost', 5672, 'admin', 'admin');
$channel = $connection->channel();
$channel->queue_declare('hello', false, false, false, false);

$msg = new AMQPMessage('hello there');
$channel->basic_publish($msg, '', 'hello');

echo $msg->body;
$channel->close();
$connection->close();

echo $_SESSION['login_user'].", You have successfully logged in!";

?>
