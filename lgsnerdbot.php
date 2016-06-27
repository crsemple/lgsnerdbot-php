<?php
//session_start()
//define('BOT_DIR, __DIR__');
int_set('memory_limit', '-1');

include 'vendor/autoload.php';

//TODO pull access token out of a config file or some shit 
$token = "MTk3MDA5Mjc5NTc0NzM2ODk2.ClLWsA.41I9KAArsvD6clbVv0H-KPygoTc";

use Discord\Discord;
use Discord\WebSockets\Event;
use Discord\WebSockets\Websocket;



?>