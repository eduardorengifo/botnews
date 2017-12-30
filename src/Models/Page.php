<?php

namespace BotNews\Models;

/**
 * Class Page
 * @package BotNews\Models
 */
class Page extends Base
{
	/**
	 * @var int
	 */
	private $paged;

	/**
	 * @var int
	 */
	private $pagedFinal;

	/**
	 * @var Post[]
	 */
	private $posts;

	/**
	 * @return int
	 */
	public function getPaged()
	{
		return $this->paged;
	}

	/**
	 * @param int $paged
	 */
	public function setPaged( $paged )
	{
		$this->paged = $paged;
	}

	/**
	 * @return int
	 */
	public function getPagedFinal()
	{
		return $this->pagedFinal;
	}

	/**
	 * @param int $pagedFinal
	 */
	public function setPagedFinal( $pagedFinal )
	{
		$this->pagedFinal = $pagedFinal;
	}

	/**
	 * @return Post[]
	 */
	public function getPosts()
	{
		return $this->posts;
	}

	/**
	 * @param Post[] $posts
	 */
	public function setPosts( $posts )
	{
		$this->posts = $posts;
	}
}