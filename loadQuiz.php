<?php
session_start();

include 'quizDropdown.php';
require_once __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
$connection = new AMQPStreamConnection('172.27.171.120', 5672, 'admin', 'admin');
$channel = $connection->channel();
$channel->queue_declare('hello', false, false, false, false);

$msg = new AMQPMessage($_SESSION['learn_grade'].$_SESSION['learn_subj']);
$channel->basic_publish($msg, '', 'hello');

echo "<br>";
echo "Quiz loading for: ";
echo $msg->body;

$channel->close();
$connection->close();

?>
