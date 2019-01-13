<?php

namespace TRACDELIGHTAPI\Model;

class Category extends BaseModel {

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
