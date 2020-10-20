
<?php
session_start();

include '../php/login.php';
require_once __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
$connection = new AMQPStreamConnection('localhost', 5672, 'admin', 'admin');
$channel = $connection->channel();
$channel->queue_declare('hello', false, false, false, false);

$msg = new AMQPMessage($_SESSION['login_user']);
$channel->basic_publish($msg, '', 'hello');
echo "<br>";
echo "Sent to RabbitMQ: ";
echo $msg->body;
$channel->close();
$connection->close();
echo "<br>";
echo "DB Login Confirmation: ";
echo $_SESSION['login_user'].", You have successfully logged in!";
?>
