<?php

namespace TRACDELIGHTAPI\Model;
use MintWare\JOM\JsonField;


class Advertiser extends BaseModel {


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
	 * @JsonField(name="company_name", type="string")
	 */
	public $company_name;

	/**
	 * @var string
	 * @JsonField(name="vat", type="string")
	 */
	public $vat;

	/**
	 * @var boolean
	 * @JsonField(name="vat_free", type="bool")
	 */
	public $vat_free;


	/**
	 * @var string
	 * @JsonField(name="address", type="string")
	 */
	public $address;

	/**
	 * @var string
	 * @JsonField(name="address_nr", type="string")
	 */
	public $address_nr;

	/**
	 * @var string
	 * @JsonField(name="address_zip", type="string")
	 */
	public $address_zip;

	/**
	 * @var string
	 * @JsonField(name="city", type="string")
	 */
	public $city;

	/**
	 * @var string
	 * @JsonField(name="country", type="string")
	 */
	public $country;


	/**
	 * @var string
	 * @JsonField(name="billing_mail", type="string")
	 */
	public $billing_mail;

	/**
	 * @var string
	 * @JsonField(name="bank_acc_owner", type="string")
	 */
	public $bank_acc_owner;

	/**
	 * @var string
	 * @JsonField(name="iban", type="string")
	 */
	public $iban;

	/**
	 * @var string
	 * @JsonField(name="bic", type="string")
	 */
	public $bic;

	/**
	 * @var string
	 * @JsonField(name="locale", type="string")
	 */
	public $locale;

	/**
	 * @var string
	 * @JsonField(name="name", type="string")
	 */
	public $name;

	/**
	 * @var string
	 * @JsonField(name="network", type="string")
	 */
	public $network;

	/**
	 * @var string
	 * @JsonField(name="description", type="string")
	 */
	public $description;

	/**
	 * @var string
	 * @JsonField(name="tracking_report_url", type="string")
	 */
	public $tracking_report_url;

	/**
	 * @var string
	 * @JsonField(name="product_feed_config", type="string")
	 */
	public $product_feed_config;



	/**
	 * @var string
	 * @JsonField(name="commission_rate", type="string")
	 */
	public $commission_rate;



	/**
	 * @var string
	 * @JsonField(name="cookie_lifetime", type="string")
	 */
	public $cookie_lifetime;

	/**
	 * @var string
	 * @JsonField(name="terms_of_service", type="string")
	 */
	public $terms_of_service;

	/**
	 * @var boolean
	 * @JsonField(name="is_active", type="boolean")
	 */
	public $is_active;


	/**
	 * @var string
	 * @JsonField(name="public_name", type="string")
	 */
	public $public_name;

	/**
	 * @var string
	 * @JsonField(name="website", type="string")
	 */
	public $website;

	/**
	 * @var string
	 * @JsonField(name="aaid", type="string")
	 */
	public $aaid;

	/**
	 * @var string
	 * @JsonField(name="logo_img", type="string")
	 */
	public $logo_img;

	/**
	 * Media Feeds
	 *
	 * @var \TRACDELIGHTAPI\Model\Campaign[]
	 * @JsonField(name="campaigns", type="\TRACDELIGHTAPI\Model\Campaign[]")
	 */
	public $campaigns;
}






