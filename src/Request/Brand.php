<?php

namespace TRACDELIGHTAPI\Request;

use MintWare\JOM\ObjectMapper;

class Brand extends BaseRequest {

	protected static $endpoint = 'brands';
	protected static $default_sorting = 'popularity';
	/**
	 *
	 * @return \TRACDELIGHTAPI\Model\Brand[]|[]
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
					$results[] = $mapper->mapJson(json_encode($dataValue), \TRACDELIGHTAPI\Model\Brand::class);
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
	 * @return \TRACDELIGHTAPI\Model\Brand|null
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public static function getByID(string $id) {
		self::$endpoint = self::$endpoint .'/' . $id;
		$results        = null;
		try {
			$mapper   = new ObjectMapper();
			$response = self::getResponse();
			$data     = json_decode($response, true);
			$results  = $mapper->mapJson(json_encode($data), \TRACDELIGHTAPI\Model\Brand::class);

		} catch (\Exception $e) {
			throw $e;
		}
		return $results;
	}


	/**
	 * @param string $name
	 *
	 * @return @return \TRACDELIGHTAPI\Model\Brand[]|[]
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public static function getByName(string $name) {
		self::filterBy(['search' => $name]);
		return self::getAll();
	}
}



