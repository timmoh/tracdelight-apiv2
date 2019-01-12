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
	 * @param string $sorting
	 */
	public static function setSorting(string $sorting = 'name') {
		self::$requestParm['sorting'] = $sorting;
	}

	/**
	 * @param int $page
	 */
	public static function setPage(int $page = 1) {
		self::$requestParm['page'] = $page;
	}

	/**
	 * @param int $pageSize
	 */
	public static function setPageSize(int $pageSize = 40) {
		self::$requestParm['page_size'] = $pageSize;
	}

	/**
	 * @param string $id
	 *
	 * @return \TRACDELIGHTAPI\Model\Advertiser|null
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public static function getByID(string $id) {
		self::$endpoint = 'advertisers/' . $id;
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
		$results = [];
		try {
			self::$requestParm['search'] = $name;
			$mapper                      = new ObjectMapper();
			$response                    = self::getResponse();
			$data                        = json_decode($response, true);
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
	 * @param string $network
	 *
	 * @return @return \TRACDELIGHTAPI\Model\Advertiser[]|[]
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public static function getByNetworkName(string $network) {
		$results = [];
		try {
			self::$requestParm['network'] = $network;
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
	 * @param bool $topshops
	 *
	 * @return @return \TRACDELIGHTAPI\Model\Advertiser[]|[]
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public static function getAllTopShops(bool $topshops) {
		$results = [];
		try {
			self::$requestParm['top_shops'] = $topshops;
			$mapper                         = new ObjectMapper();
			$response                       = self::getResponse();
			$data                           = json_decode($response, true);
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
	 * @param bool $active_campaign
	 *
	 * @return @return \TRACDELIGHTAPI\Model\Advertiser[]|[]
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public static function getAllActiveCampaign(bool $active_campaign = true) {
		$results = [];
		try {
			self::$requestParm['active_campaign'] = $active_campaign;
			$mapper                               = new ObjectMapper();
			$response                             = self::getResponse();
			$data                                 = json_decode($response, true);
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

}



