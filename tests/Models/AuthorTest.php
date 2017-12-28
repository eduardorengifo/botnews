<?php

namespace Tests\Models;

use BotNews\Models\Author;
use BotNews\Models\Image;
use PHPUnit\Framework\TestCase;

/**
 * Class AuthorTest
 * @package Tests\Models
 */
class AuthorTest extends TestCase
{
	/**
	 * @var string
	 */
	private $url;

	/**
	 * @var string
	 */
	private $slug;

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var Image
	 */
	private $logo;

	/**
	 * @var Author
	 */
	private $author;

	/**
	 * @return void
	 */
	public function setUp()
	{
		parent::setUp();

		$this->slug = '/author';
		$this->url = "https://wwww.site.com{$this->slug}";
		$this->name = 'Name';
		$this->logo = new Image(null);

		$author = new Author( $this->url );
		$author->setName( $this->name );
		$author->setLogo( $this->logo );
		$this->author = $author;
	}

	/**
	 * @return void
	 */
	public function tearDown()
	{
		parent::tearDown();
	}

	/** @test */
	public function testCanBeCreatedAuthor()
	{
		$this->assertInstanceOf( Author::class, $this->author );
		$this->assertInstanceOf( Image::class, $this->author->getLogo() );

		$this->assertEquals( $this->url, $this->author->getUrl() );
		$this->assertEquals( $this->slug, $this->author->getSlug() );
		$this->assertEquals( $this->name, $this->author->getName() );
	}
}