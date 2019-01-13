<?php

namespace TRACDELIGHTAPI\Model;
use MintWare\JOM\JsonField;

class Brand extends BaseModel {

	/**
	 * @var string
	 * @JsonField(name="id", type="string")
	 */
	public $id;

	/**
	 * @var string
	 * @JsonField(name="name", type="string")
	 */
	public $name;


	/**
	 * @var string
	 * @JsonField(name="url", type="string")
	 */
	public $url;
}
