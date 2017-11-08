<?php

namespace BotNews\Models;

/**
 * Class Post
 * @package BotNews\Models
 */
class Post {
	/**
	 * @var string
	 */
	private $title;

	/**
	 * @var string
	 */
	private $description;

	/**
	 * @var string
	 */
	private $content;

	/**
	 * @var string
	 */
	private $thumbnail;

	/**
	 * Post constructor.
	 *
	 * @param string $title
	 * @param string $description
	 * @param string $content
	 * @param string $thumbnail
	 */
	public function __construct( $title, $description, $content, $thumbnail ) {
		$this->title       = $title;
		$this->description = $description;
		$this->content     = $content;
		$this->thumbnail   = $thumbnail;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle( $title ) {
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param string $description
	 */
	public function setDescription( $description ) {
		$this->description = $description;
	}

	/**
	 * @return string
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * @param string $content
	 */
	public function setContent( $content ) {
		$this->content = $content;
	}

	/**
	 * @return string
	 */
	public function getThumbnail() {
		return $this->thumbnail;
	}

	/**
	 * @param string $thumbnail
	 */
	public function setThumbnail( $thumbnail ) {
		$this->thumbnail = $thumbnail;
	}
}