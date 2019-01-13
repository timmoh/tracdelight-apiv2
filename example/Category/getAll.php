<?php

include_once __DIR__ . '/../../vendor/autoload.php';
include_once __DIR__ . '/../apikey.php';

$client  = new \TRACDELIGHTAPI\Client($api_key);
$client->debug = true;
$request = new \TRACDELIGHTAPI\Request\Category($client);

$request->setSorting('popularity');
try {
	$output = $request::getAll();
	print_r($output);

} catch (\Exception $e) {
	echo "Error: " . $e->getMessage() . '(' . $e->getCode() . ')';
}

