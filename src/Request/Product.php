<?php

namespace TRACDELIGHTAPI\Request;

use MintWare\JOM\ObjectMapper;

class Product extends BaseRequest {

	protected static $endpoint        = 'products';
	protected static $default_sorting = 'popularity';

	/**
	 *
	 * @return \TRACDELIGHTAPI\Model\Product[]|[]
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
					$results[] = $mapper->mapJson(json_encode($dataValue), \TRACDELIGHTAPI\Model\Product::class);
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
	 * @return \TRACDELIGHTAPI\Model\Product|null
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public static function getByID(string $id) {
		self::$endpoint = self::$endpoint . '/' . $id;
		$results        = null;
		try {
			$mapper   = new ObjectMapper();
			$response = self::getResponse();
			$data     = json_decode($response, true);
			$results = $mapper->mapJson(json_encode($data), \TRACDELIGHTAPI\Model\Product::class);
		} catch (\Exception $e) {
			throw $e;
		}
		return $results;
	}

	/**
	 * @param string $id
	 *
	 * @return \TRACDELIGHTAPI\Model\Product|null
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public static function getByAdvertiserID(string $id) {
		self::$endpoint = self::$endpoint ;
		print_r(self::$default_sorting);
		self::setSorting(self::$default_sorting);
		self::filterBy(['shop_id' => $id]);
		$results        = null;
		try {
			$mapper   = new ObjectMapper();
			$response = self::getResponse();
			$data     = json_decode($response, true);
			if (count($data['results']) > 0) {
				foreach ($data['results'] as $dataValue) {
					$results[] = $mapper->mapJson(json_encode($dataValue), \TRACDELIGHTAPI\Model\Product::class);
				}
			}


		} catch (\Exception $e) {
			throw $e;
		}
		return $results;
	}
}



