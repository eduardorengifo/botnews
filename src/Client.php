<?php

namespace BotNews;

use BotNews\Helpers\Str;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class Client
 * @package BotNews
 */
class Client extends \Goutte\Client {
	/**
	 * @var string
	 */
	protected $siteUrl;

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
	 * @param string $url
	 *
	 * @return array|mixed|object|string
	 */
	public function requestJsonLD( $url ) {
		/** @var Crawler $crawler */
		$crawler = $this->requestSanitize($url, 'GET');
		return $this->getJsonLD($crawler);
	}

	/**
	 * @param Crawler $crawler
	 *
	 * @return array|mixed|object|string
	 */
	public function getJsonLD($crawler) {
		$jsonLD = $crawler->filter('script[type="application/ld+json"]')->first()->text();
		$jsonLD = html_entity_decode( $jsonLD );
		$jsonLD = json_decode ($jsonLD , TRUE);
		return $jsonLD;
	}

	/**
	 * @param string $url
	 * @param string $method
	 *
	 * @return Crawler
	 */
	public function requestSanitize( $url, $method = 'GET' ) {
		$url = Str::reduceDoubleSlashes($url);
		return $this->request($method, $url);
	}
}