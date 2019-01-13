<?php

namespace TRACDELIGHTAPI;

class Client {

	/**
	 * @var string
	 */
	protected $apiVersion = '2';
	/**
	 * @var null|string
	 */
	protected $apiKey     = null;

	/**
	 * @var string
	 */
	protected $apiProtocol     = 'https';
	/**
	 * @var string
	 */
	protected $baseUrl         = 'api.tracdelight.io';

	/**
	 * @var bool
	 */
	protected $debug = false;
	/**
	 * BaseRequest constructor.
	 *
	 * @param string $apiKey
	 * @param int    $apiVersion
	 */
	public function __construct($apiKey = null, $apiVersion = 2) {
		$this->apiKey     = $apiKey;
		$this->apiVersion = $apiVersion;
	}


	public function __get(string $name) {
		$method = 'get' . ucfirst($name);
		if (method_exists($this, $method)) {
			return $this->$method();
		}
		if (property_exists($this, $name)) {
			return $this->{$name};
		} else {
			return null;
		}
	}

	public function __set(string $name, $value) {
		$method = 'set' . ucfirst($name);
		if (method_exists($this, $method)) {
			return $this->$method($value);
		}
		if (property_exists($this, $name)) {

			$this->{$name} = $value;
		}
	}


}