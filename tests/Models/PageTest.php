<?php

namespace Tests\Models;

use BotNews\Models\Page;
use BotNews\Models\Post;
use PHPUnit\Framework\TestCase;

/**
 * Class PageTest
 * @package Tests\Models
 */
class PageTest extends TestCase {

	/**
	 * @var Page
	 */
	private $page;

	/**
	 * PageTest constructor.
	 *
	 * @param null $name
	 * @param array $data
	 * @param string $dataName
	 */
	public function __construct( $name = null, array $data = [], $dataName = '' ) {
		parent::__construct( $name, $data, $dataName );

		$posts = [
			new Post(
				'Title 1',
				'Description 1',
				'Content 1',
				'Thumbnail 1'
			),
			new Post(
				'Title 2',
				'Description 2',
				'Content 2',
				'Thumbnail 2'
			),
			new Post(
				'Title 3',
				'Description 3',
				'Content 3',
				'Thumbnail 3'
			)
		];

		$this->page = new Page(
			1,
			100,
			$posts
		);
	}

	/** @test */
	public function testCanBeCreatedPage()
	{
		$this->assertInstanceOf(Page::class, $this->page);
		$this->assertEquals(1, $this->page->getPaged());
		$this->assertEquals(100, $this->page->getPagedFinal());
		$this->assertInstanceOf(Post::class, $this->page->getPosts()[0]);
	}
}