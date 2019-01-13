<?php

namespace TRACDELIGHTAPI\Model;
use MintWare\JOM\JsonField;


class Product extends BaseModel {


	/**
	 * @var string
	 * @JsonField(name="id", type="string")
	 */
	public $id;

	/**
	 * @var string
	 * @JsonField(name="url", type="string")
	 */
	public $url;


	/**
	 * @var string
	 * @JsonField(name="title", type="string")
	 */
	public $title;

	/**
	 * @var string
	 * @JsonField(name="description", type="string")
	 */
	public $description;

	/**
	 * Category
	 *
	 * @var \TRACDELIGHTAPI\Model\Category
	 * @JsonField(name="category", type="\TRACDELIGHTAPI\Model\Category")
	 */
	public $category;


	/**
	 * @var \TRACDELIGHTAPI\Model\Brand
	 * @JsonField(name="brand", type="\TRACDELIGHTAPI\Model\Brand")
	 */
	public $brand;

	/**
	 * @var \TRACDELIGHTAPI\Model\Shop
	 * @JsonField(name="shop", type="\TRACDELIGHTAPI\Model\Shop")
	 */
	public $shop;

	/**
	 * @var \TRACDELIGHTAPI\Model\Price
	 * @JsonField(name="list_price", type="\TRACDELIGHTAPI\Model\Price")
	 */
	public $list_price;


	/**
	 * @var array
	 * @JsonField(name="tags", type="array")
	 */
	public $tags;


	/**
	 * @var \TRACDELIGHTAPI\Model\Image
	 * @JsonField(name="images", type="\TRACDELIGHTAPI\Model\Image")
	 */
	public $images;

	/**
	 * @var string
	 * @JsonField(name="tracking", type="string")
	 */
	public $tracking;
}






