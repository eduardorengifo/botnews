<?php

namespace BotNews\Sites;

use BotNews\BotNews;
use BotNews\Client;
use BotNews\Models\Page;
use BotNews\Models\Post;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class Rpp
 * @package BotNews\Sites
 */
class Rpp extends Client implements BotNews {
	/**
	 * @var string
	 */
	protected $siteUrl = 'http://rpp.pe';

	/**
	 * @param mixed $id
	 *
	 * @return Post
	 */
	public function getPost( $id ) {
		$json_ld = parent::requestJsonLD("{$this->siteUrl}/{$id}");

		return new Post(
			$json_ld['alternativeHeadline'],
			$json_ld['description'],
			$json_ld['articleBody'],
			$json_ld['image']['Url']
		);
	}

	/**
	 * @param mixed $paged
	 *
	 * @return Page
	 */
	public function getPage( $paged = 'futbol' ) {
		/** @var Crawler $crawler */
		$crawler = parent::requestSanitize("{$this->siteUrl}/feed/{$paged}");
		$posts = $crawler->filter('item')->each(function ($node) {
			/** @var Crawler $node */
			return new Post(
				$node->filter('title')->text(),
				$node->filter('description')->text(),
				$node->filter('description')->text(),
				$node->filter('media|content')->attr('url')
			);
		});

		return new Page(
			1,
			1,
			$posts
		);
	}
}