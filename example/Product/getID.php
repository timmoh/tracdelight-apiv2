<?php

include_once __DIR__ . '/../../vendor/autoload.php';
include_once __DIR__ . '/../apikey.php';

$client  = new \TRACDELIGHTAPI\Client($api_key);
$request = new \TRACDELIGHTAPI\Request\Product($client);

try {
	$output = $request::getByID('v23x6ortuy1szf9b');
	print_r($output);

} catch (\Exception $e) {
	echo "Error: " . $e->getMessage() . '(' . $e->getCode() . ')';
}

