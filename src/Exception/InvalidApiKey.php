<?php

namespace TRACDELIGHTAPI\Exception;

class InvalidApiKey extends \TRACDELIGHTAPI\Exception\ApiException
{
	protected $message = 'ApiKey is invalid';
}