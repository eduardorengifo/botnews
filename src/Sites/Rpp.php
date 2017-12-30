<?php

namespace BotNews\Sites;

use BotNews\BotNews;
use BotNews\Client;
use BotNews\Helpers\JsonLD;
use BotNews\Helpers\Str;
use BotNews\Models\Image;
use BotNews\Models\Page;
use BotNews\Models\Post;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class Rpp
 * @package BotNews\Sites
 */
class Rpp extends Client implements BotNews
{
	/**
	 * @var string
	 */
	protected $siteUrl = 'http://rpp.pe';

	/**
	 * @param string $slug
	 *
	 * @return Post
	 */
	public function getPost( $slug )
	{
		$jsonLD = parent::requestJsonLD("{$this->siteUrl}/{$slug}");
		$post = JsonLD::article( $jsonLD );
		$post->setTitle( @$jsonLD['alternativeHeadline'] );
		return $post;
	}

	/**
	 * @param mixed $paged
	 *
	 * @return Page
	 */
	public function getPage( $paged = 'futbol' )
	{
		/** @var Crawler $crawler */
		$crawler = parent::requestSanitize("{$this->siteUrl}/feed/{$paged}");
		$posts = $crawler->filter('item')->each(function ( $node ) {
			/** @var Crawler $node */
			$title = $node->filter('title')->text();
			$description = $node->filter('description')->text();
			$href = $node->filter('link')->text();
			$url = Str::createUrlValid( $href, $this->siteUrl );
			$thumbnail_url = $node->filter('media|content')->attr('url');
			$thumbnail = new Image( $thumbnail_url );

			$post = new Post( $url );
			$post->setTitle( $title );
			$post->setDescription( $description );
			$post->setThumbnail( $thumbnail );
			return $post;
		});

		$url_page = Str::createUrlValid( $paged, $this->siteUrl );

		$page = new Page( $url_page );
		$page->setPosts( $posts );
		return $page;
	}
}