<?php
            require_once __DIR__ . '/vendor/autoload.php';
            
            $lines = file('testQuestions.txt', FILE_IGNORE_NEW_LINES);
            
            use PhpAmqpLib\Connection\AMQPStreamConnection;
	    use PhpAmqpLib\Message\AMQPMessage;
            $connection = new AMQPStreamConnection('172.27.171.120', 5672, 'admin', 'admin');
 	    $channel = $connection->channel();
 	    $question1 = $lines[0];
 	    $question2 = $lines[5];
 	    $question3 = $lines[10];
 	    $question4 = $lines[15];
 	    $question5 = $lines[20];
 	    $tableName = "?".$lines[25];
 	   
 	    $answer1 = $_POST['question-1-answers'];
            $answer2 = $_POST['question-2-answers'];
            $answer3 = $_POST['question-3-answers'];
            $answer4 = $_POST['question-4-answers'];
            $answer5 = $_POST['question-5-answers'];
 	    
 	    $submit1 = $question1.' '.$answer1;
 	    $submit2 = $question2.' '.$answer2;
 	    $submit3 = $question3.' '.$answer3;
 	    $submit4 = $question4.' '.$answer4;
 	    $submit5 = $question5.' '.$answer5;
 	    
	    $channel->queue_declare('requestResults', false, false, false, false);
	    $first = new AMQPMessage($submit1);
	    $channel->basic_publish($first, '', 'requestResults');
	    echo "Sent to RabbitMQ: ";
	    echo $first->body;
	    
	    $second = new AMQPMessage($submit2);
	    $channel->basic_publish($second, '', 'requestResults');
	    echo "Sent to RabbitMQ: ";
	    echo $second->body;
	    
	    $third = new AMQPMessage($submit3);
	    $channel->basic_publish($third, '', 'requestResults');
	    echo "Sent to RabbitMQ: ";
	    echo $third->body;
	    
	    $fourth = new AMQPMessage($submit4);
	    $channel->basic_publish($fourth, '', 'requestResults');
	    echo "Sent to RabbitMQ: ";
	    echo $fourth->body;
	    
	    $fifth = new AMQPMessage($submit5);
	    $channel->basic_publish($fifth, '', 'requestResults');
	    echo "Sent to RabbitMQ: ";
	    echo $fifth->body;
	    
	    $testName = new AMQPMessage($tableName);
	    $channel->basic_publish($testName, '', 'requestResults');
	    echo "Sent to RabbitMQ: ";
	    echo $testName->body;

	    $connection->close();
	    $channel->close();
	    
	    //Remove temp questions txt file
	    $filePath = 'testQuestions.txt';
	    unlink($filePath);
?>
	
	
