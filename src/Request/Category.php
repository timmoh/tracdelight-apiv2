<?php

namespace TRACDELIGHTAPI\Request;

use MintWare\JOM\ObjectMapper;

class Category extends BaseRequest {

	protected static $endpoint        = 'categories';
	protected static $default_sorting = 'popularity';

	/**
	 * @param bool $ancestors
	 * @param bool $children
	 *
	 * @return \TRACDELIGHTAPI\Model\Category[]|[]
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public static function getAll(bool $ancestors = false, bool $children = false) {
		$results                        = [];
		self::$requestParm['ancestors'] = $ancestors;
		self::$requestParm['children']  = $children;
		try {
			$mapper   = new ObjectMapper();
			$response = self::getResponse();
			$data     = json_decode($response, true);
			if (count($data['results']) > 0) {
				foreach ($data['results'] as $dataValue) {
					print_r($dataValue);
					$results[] = $mapper->mapJson(json_encode($dataValue), \TRACDELIGHTAPI\Model\Category::class);
				}
			}
		} catch (\Exception $e) {
			throw $e;
		}

		return $results;
	}

	/**
	 * @param string $id
	 * @param bool   $ancestors
	 * @param bool   $children
	 *
	 * @return \TRACDELIGHTAPI\Model\Category|null
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public static function getByID(string $id, bool $ancestors = false, bool $children = false) {
		self::$endpoint                 = self::$endpoint . '/' . $id;
		self::$requestParm['ancestors'] = $ancestors;
		self::$requestParm['children']  = $children;

		$results = null;
		try {
			$mapper   = new ObjectMapper();
			$response = self::getResponse();
			$data     = json_decode($response, true);

			$results = $mapper->mapJson(json_encode($data), \TRACDELIGHTAPI\Model\Category::class);

		} catch (\Exception $e) {
			throw $e;
		}
		return $results;
	}

	/**
	 * @param string $id
	 * @param bool   $ancestors
	 * @param bool   $children
	 *
	 * @return \TRACDELIGHTAPI\Model\Category|null
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public static function getBySlug(string $id, bool $ancestors = false, bool $children = false) {
		self::$endpoint                 = self::$endpoint . '/' . $id;
		self::$requestParm['ancestors'] = $ancestors;
		self::$requestParm['children']  = $children;

		$results = null;
		try {
			$mapper   = new ObjectMapper();
			$response = self::getResponse();
			$data     = json_decode($response, true);
			$results  = $mapper->mapJson(json_encode($data), \TRACDELIGHTAPI\Model\Category::class);

		} catch (\Exception $e) {
			throw $e;
		}
		return $results;
	}
}



