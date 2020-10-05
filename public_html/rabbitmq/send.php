<?php
chdir(dirname(__DIR__));
require_once('vendor/autoload.php');

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'admin', 'admin');
$channel = $connection->channel();

$channel->queue_declare('message', false, false, false, false);

$msg = new AMPQMessage('Message from front-end');
$channel->basic_publish($msg, '', 'message');

$channel->close();
$connection->close();

 ?>
