<?php

namespace TRACDELIGHTAPI\Model;

class Price extends BaseModel {

	/**
	 * @var string
	 * @JsonField(name="delivery_time", type="string")
	 */
	public $delivery_time;

	/**
	 * @var float
	 * @JsonField(name="old", type="float")
	 */
	public $old;

	/**
	 * @var float
	 * @JsonField(name="current", type="float")
	 */
	public $current;

	/**
	 * @var string
	 * @JsonField(name="currency", type="string")
	 */
	public $currency;

	/**
	 * @var string
	 * @JsonField(name="base", type="string")
	 */
	public $base;


	/**
	 * @var float
	 * @JsonField(name="shipping_costs", type="float")
	 */
	public $shipping_costs;
}
