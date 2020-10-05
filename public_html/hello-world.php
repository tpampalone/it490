<?php

$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die('Failed to create socket');

socket_bind($socket, 0, 5000);
socket_listen($socket);

$msg = '<html><body>Hello World!</body></html>';
$connectmsg = "Connected to port 5000. Message sent.\n";

for(;;) {
  if($client = @socket_accept($socket)) {
    socket_write($client, "HTTP/1.1 200 OK\r\n" .
                "Content-length: " . strlen($msg) . "\r\n" .
                "Content-Type: text/html; charset=UTF-8\r\n\r\n" .
                $msg);
    echo $connectmsg;
    exit();
  } else usleep(100000);
}

?>
