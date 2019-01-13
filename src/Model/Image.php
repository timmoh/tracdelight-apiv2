<?php

namespace TRACDELIGHTAPI\Model;
use MintWare\JOM\JsonField;


class Image extends BaseModel {


	/**
	 * @var string
	 * @JsonField(name="url", type="string")
	 */
	public $url;

	/**
	 * @var string
	 * @JsonField(name="url_template", type="string")
	 */
	public $url_template;

	/**
	 * @var string
	 * @JsonField(name="extracted_template", type="string")
	 */
	public $extracted_template;

	/**
	 * @var string
	 * @JsonField(name="extracted_url", type="string")
	 */
	public $extracted_url;

}






