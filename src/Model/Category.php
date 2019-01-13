<?php

namespace TRACDELIGHTAPI\Model;
use MintWare\JOM\JsonField;


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


	/**
	 * @var string
	 * @JsonField(name="url", type="string")
	 */
	public $url;


	/**
	 * @var string
	 * @JsonField(name="slug", type="string")
	 */
	public $slug;

	/**
	 * @var string
	 * @JsonField(name="parent", type="string")
	 */
	public $parent;

	/**
	 * @var int
	 * @JsonField(name="lft", type="int")
	 */
	public $lft;

	/**
	 * @var int
	 * @JsonField(name="rght", type="int")
	 */
	public $rght;

	/**
	 * @var int
	 * @JsonField(name="depth", type="int")
	 */
	public $depth;



	/**
	 * Child Category
	 *
	 * @var \TRACDELIGHTAPI\Model\Category[]
	 * @JsonField(name="children", type="\TRACDELIGHTAPI\Model\Category[]")
	 */
	public $children;


	/**
	 * ancestors Category
	 *
	 * @var \TRACDELIGHTAPI\Model\Category
	 * @JsonField(name="ancestors", type="\TRACDELIGHTAPI\Model\Category")
	 */
	public $ancestors;

}
