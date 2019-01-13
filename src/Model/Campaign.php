<?php

namespace TRACDELIGHTAPI\Model;
use MintWare\JOM\JsonField;


class Campaign extends BaseModel {

	/**
	 * @var string
	 * @JsonField(name="rate_type", type="string")
	 */
	public $rate_type;

	/**
	 * @var string
	 * @JsonField(name="type", type="string")
	 */
	public $type;

	/**
	 * @var float
	 * @JsonField(name="rate", type="float|int")
	 */
	public $rate;

}
