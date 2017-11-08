<?php

namespace BotNews\Models;

/**
 * Class Page
 * @package BotNews\Models
 */
class Page {
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
	 * Page constructor.
	 *
	 * @param int $paged
	 * @param int $pagedFinal
	 * @param Post[] $posts
	 */
	public function __construct( $paged, $pagedFinal, array $posts ) {
		$this->paged      = $paged;
		$this->pagedFinal = $pagedFinal;
		$this->posts      = $posts;
	}

	/**
	 * @return int
	 */
	public function getPaged() {
		return $this->paged;
	}

	/**
	 * @param int $paged
	 */
	public function setPaged( $paged ) {
		$this->paged = $paged;
	}

	/**
	 * @return int
	 */
	public function getPagedFinal() {
		return $this->pagedFinal;
	}

	/**
	 * @param int $pagedFinal
	 */
	public function setPagedFinal( $pagedFinal ) {
		$this->pagedFinal = $pagedFinal;
	}

	/**
	 * @return Post[]
	 */
	public function getPosts() {
		return $this->posts;
	}

	/**
	 * @param Post[] $posts
	 */
	public function setPosts( $posts ) {
		$this->posts = $posts;
	}
}