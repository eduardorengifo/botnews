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
	 * @param mixed $id
	 *
	 * @return Post
	 */
	public function getPost( $id );

	/**
	 * @param mixed $paged
	 *
	 * @return Page
	 */
	public function getPage( $paged = 1 );
}