<?php

use rdx\http\HTTP;

require 'inc.bootstrap.php';

header('Content-type: text/plain; charset=utf-8');

$request = HTTP::create('https://api.github.com/notifications', [
	'method' => 'get',
	'headers' => [
		'Authorization: Bearer ' . GITHUB_ACCESS_TOKEN,
		'If-Modified-Since: ' . date('r', strtotime('-1 week')),
	],
]);

$response = $request->request();
echo $response->info['request_header'] . "\n\n\n\n";
echo $response;
