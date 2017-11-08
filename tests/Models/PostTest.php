<?php

namespace Tests\Models;

use BotNews\Models\Post;
use PHPUnit\Framework\TestCase;

/**
 * Class PostTest
 * @package Tests\Models
 */
class PostTest extends TestCase {

	/**
	 * @var Post
	 */
	private $post;

	/**
	 * PostTest constructor.
	 *
	 * @param null $name
	 * @param array $data
	 * @param string $dataName
	 */
	public function __construct( $name = null, array $data = [], $dataName = '' ) {
		parent::__construct( $name, $data, $dataName );

		$this->post = new Post(
			'Title',
			'Description',
			'Content',
			'Thumbnail'
		);
	}

	/** @test */
	public function testCanBeCreatedPost()
	{
		$this->assertInstanceOf(Post::class, $this->post);
		$this->assertEquals('Title', $this->post->getTitle());
		$this->assertEquals('Description', $this->post->getDescription());
		$this->assertEquals('Content', $this->post->getContent());
		$this->assertEquals('Thumbnail', $this->post->getThumbnail());
	}
}