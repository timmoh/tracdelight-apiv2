<?php

namespace TRACDELIGHTAPI\Model;

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
}
