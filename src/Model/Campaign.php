<?php

namespace TRACDELIGHTAPI\Model;

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
	 * @JsonField(name="rate", type="float")
	 */
	public $rate;

}
