<?php

namespace TRACDELIGHTAPI\Request;

use MintWare\JOM\ObjectMapper;

class Advertiser extends BaseRequest {

	protected static $endpoint = 'advertisers';

	/**
	 *
	 * @return \TRACDELIGHTAPI\Model\Advertiser[]|[]
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public static function getAll() {
		$results = [];
		try {
			$mapper   = new ObjectMapper();
			$response = self::getResponse();
			$data     = json_decode($response, true);
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
		self::$endpoint = self::$endpoint . '/' . $id;
		$results        = null;
		try {
			$mapper   = new ObjectMapper();
			$response = self::getResponse();
			$data     = json_decode($response, true);
			$results  = $mapper->mapJson(json_encode($data), \TRACDELIGHTAPI\Model\Advertiser::class);

		} catch (\Exception $e) {
			throw $e;
		}
		return $results;
	}

	/**
	 * @param string $name
	 *
	 * @return @return \TRACDELIGHTAPI\Model\Advertiser[]|[]
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public static function getByName(string $name) {
		self::filterBy(['name' => $name]);
		return self::getAll();
	}

	/**
	 * @param string $network
	 *
	 * @return @return \TRACDELIGHTAPI\Model\Advertiser[]|[]
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public static function getByNetworkName(string $network) {
		self::filterBy(['network' => $network]);
		return self::getAll();
	}

	/**
	 * @param bool $topshops
	 *
	 * @return @return \TRACDELIGHTAPI\Model\Advertiser[]|[]
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public static function getAllTopShops(bool $topshops=true) {
		self::filterBy(['top_shops' => $topshops]);
		return self::getAll();
	}

	/**
	 * @param bool $active_campaign
	 *
	 * @return @return \TRACDELIGHTAPI\Model\Advertiser[]|[]
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public static function getAllActiveCampaign(bool $active_campaign = true) {
		self::filterBy(['active_campaign' => $active_campaign]);
		return self::getAll();
	}

}



