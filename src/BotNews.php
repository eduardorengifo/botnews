<?php

namespace BotNews;

use BotNews\Helpers\Str;
use BotNews\Models\Page;
use BotNews\Models\Post;
use Goutte\Client;

/**
 * Class BotNews
 * @package BotNews
 */
abstract class BotNews {
	/**
	 * @var string
	 */
	protected $siteUrl;

	/**
	 * @var Client
	 */
	protected $client;

	public function __construct() {
		$this->client = new Client();
	}

	/**
	 * @return string
	 */
	public function getSiteUrl() {
		return $this->siteUrl;
	}

	/**
	 * @param string $siteUrl
	 */
	public function setSiteUrl( $siteUrl ) {
		$this->siteUrl = $siteUrl;
	}

	/**
	 * @param $url
	 * @param string $method
	 *
	 * @return \Symfony\Component\DomCrawler\Crawler
	 */
	protected function request( $url, $method = 'GET' ) {
		$url = Str::reduceDoubleSlashes($url);
		return $this->client->request($method, $url);
	}

	/**
	 * @param mixed $id
	 *
	 * @return Post
	 */
	abstract public function getPost( $id );

	/**
	 * @param mixed $paged
	 *
	 * @return Page
	 */
	abstract public function getPage( $paged = 1 );
}