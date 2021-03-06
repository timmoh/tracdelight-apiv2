<?php

include_once __DIR__ . '/../../vendor/autoload.php';
include_once __DIR__ . '/../apikey.php';

$client  = new \TRACDELIGHTAPI\Client($api_key);
$request = new \TRACDELIGHTAPI\Request\Advertiser($client);


$request->setSorting('name');

$advertiserNonPPC = [];

try {
	$request::setPageSize(100);
	$advertisers = $request::getAll(true);
	foreach($advertisers AS $advertiser){
		foreach($advertiser->campaigns AS $campaigns){
			if($campaigns->type!='ppc' && $advertiser->is_active==1){
				$advertiserNonPPC[] = ['id'=>$advertiser->id,'name'=>$advertiser->company_name,'aaid'=>$advertiser->aaid];
				echo "\n['id'=>'$advertiser->id','name'=>'$advertiser->company_name','aaid'=>'$advertiser->aaid'],";
			}
		}
	}

	print_r($advertiserNonPPC);

} catch (\Exception $e) {
	echo "Error: " . $e->getMessage() . '(' . $e->getCode() . ')';
}

