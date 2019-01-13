<?php

namespace TRACDELIGHTAPI\Model;
use MintWare\JOM\JsonField;


class Shop extends BaseModel {


	/**
	 * @var string
	 * @JsonField(name="id", type="string")
	 */
	public $id;

	/**
	 * @var bool
	 * @JsonField(name="has_active_ppc_campaign", type="bool")
	 */
	public $has_active_ppc_campaign;


	/**
	 * @var string
	 * @JsonField(name="name", type="string")
	 */
	public $name;

}






