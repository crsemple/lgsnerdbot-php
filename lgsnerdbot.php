<?php
//https://discordapp.com/oauth2/authorize?client_id=197009216567902208&scope=bot&permissions=3072

//session_start()
//define('BOT_DIR, __DIR__');
ini_set('memory_limit', '-1');

include 'vendor/autoload.php';

//Load configuration file
$configs = parse_ini_file('config.ini', true);


use Discord\Discord;
use Discord\WebSockets\Event;
use Discord\WebSockets\WebSocket;

$discord = new Discord(['token' => $configs['credentials']['oauthToken']]);

$socket = new WebSocket($discord);

$socket->on(
	'ready',
	function ($discord) use ($socket) 
	{
		echo "Discord WebSocket is ready!".PHP_EOL;

		$socket->on(
			Event::MESSAGE_CREATE,
			function($message,$discord,$newdiscord)
			{
				if($message->content == 'ping')
				{
					$message->reply('pong!');
				}

				$reply = $message->timestamp->format('d/m/y H:i:s').' - ';
				$reply .= $message->full_channel->guild->name.' - ';
				$reply .= $message->author->username.' - ';
				$reply .= $message->content;
				echo $reply.PHP_EOL;
			}
		);
	}
);


$socket->on(
	'error',
	function($error, $socket)
	{
		dump($error);
		exit(1);
	}
);

$socket->run();
?>