<?php

namespace TRACDELIGHTAPI\Request;

use MintWare\JOM\ObjectMapper;

class Advertiser extends BaseRequest {

	protected static $endpoint = 'advertisers';

	/**
	 * @param int    $page
	 * @param string $sorting
	 *
	 * @return \TRACDELIGHTAPI\Model\Advertiser[]|[]
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public static function getAll(int $page = 1, string $sorting = 'name') {
		$results = [];
		try {
			self::$requestParm['page']    = (int)$page;
			self::$requestParm['sorting'] = $sorting;
			$mapper                       = new ObjectMapper();
			$response                     = self::getResponse();
			$data                         = json_decode($response, true);
			if (count($data['results']) > 0) {
				foreach ($data['results'] as $dataValue) {
					$results[] = $mapper->mapJson(json_encode($dataValue), \TRACDELIGHTAPI\Model\Advertiser::class);
				}
			}
		} catch (\Exception $e) {
			throw $e;
		}

		return $results;
	}

	/**
	 * @param string $id
	 *
	 * @return \TRACDELIGHTAPI\Model\Advertiser|null
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public static function getByID(string $id) {
		self::$endpoint = 'advertisers/' . $id;
		$results = null;
		try {
			$mapper    = new ObjectMapper();
			$response  = self::getResponse();
			$data      = json_decode($response, true);
			$results = $mapper->mapJson(json_encode($data), \TRACDELIGHTAPI\Model\Advertiser::class);

		} catch (\Exception $e) {
			throw $e;
		}
		return $results;
	}


	public static function searchByName(string $name) {
		throw new \TRACDELIGHTAPI\Exception\NotImplemented();
	}

	public static function searchByNetworkName(string $name) {
		throw new \TRACDELIGHTAPI\Exception\NotImplemented();
	}

	public static function getAllTopShops() {
		throw new \TRACDELIGHTAPI\Exception\NotImplemented();
	}

	public static function getAllActiveCampaign() {
		throw new \TRACDELIGHTAPI\Exception\NotImplemented();
	}

}



