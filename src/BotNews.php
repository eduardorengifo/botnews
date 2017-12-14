<?php

namespace BotNews;

use BotNews\Models\Page;
use BotNews\Models\Post;

/**
 * Class BotNews
 * @package BotNews
 */
interface BotNews {
	/**
	 * @param string $slug
	 *
	 * @return Post
	 */
	public function getPost( $slug );

	/**
	 * @param mixed $paged
	 *
	 * @return Page
	 */
	public function getPage( $paged = 1 );
}