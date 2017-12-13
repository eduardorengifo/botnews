<?php

namespace BotNews\Models;

/**
 * Class Base
 * @package BotNews\Models
 */
class Base {
	/**
	 * @var string
	 */
	private $url;

	/**
	 * Base constructor.
	 *
	 * @param string $url
	 */
	public function __construct( $url ) {
		$this->url = $url;
	}

	/**
	 * @return string
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * @param string $url
	 */
	public function setUrl( $url ) {
		$this->url = $url;
	}
}