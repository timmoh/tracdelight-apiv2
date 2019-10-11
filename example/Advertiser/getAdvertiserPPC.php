<?php

include_once __DIR__ . '/../../vendor/autoload.php';
include_once __DIR__ . '/../apikey.php';

$client  = new \TRACDELIGHTAPI\Client($api_key);
$request = new \TRACDELIGHTAPI\Request\Advertiser($client);


$request->setSorting('name');

$advertiserPPC = [];

try {

	$request::setPageSize(100);
	$advertisers = $request::getAll();
	foreach($advertisers AS $advertiser){
		foreach($advertiser->campaigns AS $campaigns){
			if($campaigns->type=='ppc' && $advertiser->is_active==1){
				$advertiserPPC[] = ['id'=>$advertiser->id,'name'=>$advertiser->company_name,'aaid'=>$advertiser->aaid];
			}
		}
	}

	print_r($advertiserPPC);

} catch (\Exception $e) {
	echo "Error: " . $e->getMessage() . '(' . $e->getCode() . ')';
}

