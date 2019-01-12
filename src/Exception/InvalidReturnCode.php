<?php

namespace TRACDELIGHTAPI\Exception;

class InvalidReturnCode extends \TRACDELIGHTAPI\Exception\ApiException {

	protected $message = 'Return Code from API is invalid';
}