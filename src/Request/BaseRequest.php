<?php

namespace TRACDELIGHTAPI\Request;

use GuzzleHttp\TransferStats;
use TRACDELIGHTAPI\Exception\ApiException;
use TRACDELIGHTAPI\Exception\InvalidApiKey;
use TRACDELIGHTAPI\Exception\InvalidReturnCode;
use TRACDELIGHTAPI\Exception\NoContent;

class BaseRequest {

	/**
	 * @var \GuzzleHttp\Client|null
	 */
	protected static $httpclient = null;

	/**
	 * @var string|null
	 */
	protected static $response = null;
	/**
	 * @var array|null
	 */
	protected static $responseHeader = null;
	/**
	 * @var \TRACDELIGHTAPI\Client|null
	 */
	protected static $client = null;

	protected static $subUrl = '';

	/**
	 * parameter to send via post/put
	 * @var array
	 */
	protected static $requestParm = [];
	/**
	 * possible parameter that could be filled
	 * @var array
	 */
	protected static $possibleParm = [];
	/**
	 * API Endpoint
	 * @var string|null
	 */
	protected static $endpoint = null;
	/**
	 * HTTP Method
	 * @var string
	 */
	protected static $method = 'get';

	/**
	 * BaseRequest constructor.
	 *
	 * @param \TRACDELIGHTAPI\Client $client
	 */
	function __construct(\TRACDELIGHTAPI\Client $client) {
		self::$client     = $client;
		self::$httpclient = new \GuzzleHttp\Client();
	}

	/**
	 * Build Base URL for API
	 * @return string
	 */
	protected static function apiBaseUrl() {
		return self::$client->apiProtocol . '://' . self::$client->baseUrl . '/v' . self::$client->apiVersion . '';
	}

	/**
	 * Build complete URL for Api Endpoint
	 * @return string
	 */
	protected static function apiUrlRequest() {
		$url = [static::apiBaseUrl()];
		print_r($url);
		static::buildApiKey();

		if (!empty(static::$endpoint)) {
			$url[] = static::$endpoint;
		}
		if (!empty(static::$subUrl)) {
			$url[] = static::$subUrl;
		}
		$returnUrl = implode('/', $url);

		//if parameter should be send via query url?foo=bar
		$returnUrl .= '?' . http_build_query(self::$requestParm);

		echo $returnUrl;
		return $returnUrl;
	}

	/**
	 * Build Parm for Request
	 * @return array
	 */
	protected static function buildReqeustParm() {
		$parms = [];
		foreach (static::$possibleParm AS $key) {
			if (isset(static::$requestParm[$key]) && !empty(static::$requestParm[$key])) {
				$parms[$key] = static::$requestParm[$key];
			}
		}

		return $parms;
	}

	/**
	 * @throws \TRACDELIGHTAPI\Exception\NoApiKey
	 */
	protected static function buildApiKey() {
		$apikey = self::$client->apiKey;
		if (empty($apikey)) {
			throw new \TRACDELIGHTAPI\Exception\NoApiKey();
		}

		self::$requestParm['accesskey'] = $apikey;
	}

	/**
	 * Get Response form HTTP Api Request and Check if it's valid
	 *
	 * @return null|string
	 * @throws ApiException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	protected static function getResponse() {
		try {

			$url     = static::apiUrlRequest();
			$request = new \GuzzleHttp\Psr7\Request(strtoupper(self::$method), $url);

			$requestHeaderParms             = [];
			$requestHeaderParms['on_stats'] = function (TransferStats $stats) use (&$effectiveUrl) {
				$effectiveUrl = $stats->getEffectiveUri();
			};
			$response                       = self::$httpclient->send($request, $requestHeaderParms);
			self::checkStatusCode($response->getStatusCode());
			self::checkEffectiveUrl($effectiveUrl);
			self::$response = $response->getBody()->getContents();
			self::checkResponse(self::$response);
			self::$responseHeader = $response->getHeaders();
			return self::$response;

		} catch (\GuzzleHttp\Exception\RequestException $e) {
			$errorResponse = json_decode($e->getResponse()->getBody(true)->getContents(), true);
			throw new ApiException($errorResponse['message'], $e->getResponse()->getStatusCode());
		} catch (\Exception $e) {
			throw $e;
		} finally {
			self::resetRequestParameter();
		}

	}

	/**
	 * Reset Parameter
	 */
	protected static function resetRequestParameter() {
		self::$subUrl       = '';
		self::$requestParm  = [];
		self::$possibleParm = [];
		self::$endpoint     = null;
		self::$method       = 'get';
	}

	/**
	 * Checks Status of Return Code
	 *
	 * @param string $statusCode
	 *
	 * @throws NoContent
	 */
	protected static function checkStatusCode(string $statusCode) {
		if ($statusCode == 204) {
			throw new NoContent();
		}

	}

	/**
	 * Checks Url if its redirected to login page
	 *
	 * @param string $url
	 *
	 * @throws InvalidApiKey
	 */
	protected static function checkEffectiveUrl(string $url) {
		$urlParsed = parse_url($url);
		if (strpos($urlParsed['path'], 'login') > 0) {
			throw new InvalidApiKey();
		}

	}

	/**
	 * @param string $content
	 *
	 * @throws InvalidReturnCode
	 */
	protected static function checkResponse(string $content) {
		json_decode($content);
		if (json_last_error() != JSON_ERROR_NONE) {
			throw new InvalidReturnCode();
		}
	}
}