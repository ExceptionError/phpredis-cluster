<?php

$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_set_option($sock, SOL_SOCKET, SO_REUSEADDR, 1);
socket_bind($sock, '127.0.0.1', 5000);
socket_listen($sock);

$redis = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_set_option($sock, SOL_SOCKET, SO_REUSEADDR, 1);
socket_connect($redis, 'redis-node-0', 6379);

while ($remote = socket_accept($sock)) {
    while ($line = socket_read($remote, 1024)) {
        if (strpos($line, 'CLUSTER') !== false) {
            echo 'CLUSTER SLOTES' . "\n";
        }
        socket_write($redis, $line, strlen($line));
        $out = socket_read($redis, 4096);
        socket_write($remote, $out);    
    }
}
