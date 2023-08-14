<?php
$host = 'sandbox.smtp.mailtrap.io';
$port = 2525;

$socket = stream_socket_client("tcp://$host:$port", $errno, $errstr, 10);

if (!$socket) {
    echo "Error: $errstr ($errno)";
} else {
    fclose($socket);
    echo "Connection successful!";
}
