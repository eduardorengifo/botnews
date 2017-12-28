<?php

namespace Tests\Models;

use BotNews\Models\Image;
use PHPUnit\Framework\TestCase;

/**
 * Class ImageTest
 * @package Tests\Models
 */
class ImageTest extends TestCase
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
	 * @var int
	 */
	private $height;

	/**
	 * @var int
	 */
	private $width;

	/**
	 * @var Image
	 */
	private $image;

	/**
	 * @return void
	 */
	public function setUp()
	{
		parent::setUp();

		$this->slug = '/images/image.jpg';
		$this->url = "http://site.com{$this->slug}";
		$this->height = 200;
		$this->width = 200;

		$image = new Image( $this->url );
		$image->setHeight( $this->height );
		$image->setWidth( $this->width );
		$this->image = $image;
	}

	/**
	 * return void
	 */
	public function tearDown()
	{
		parent::tearDown();

		$this->image = new Image(null);
	}

	/** @test */
	public function testCanBeCreatedImage()
	{
		$this->assertInstanceOf( Image::class, $this->image );

		$this->assertEquals( $this->url, $this->image->getUrl() );
		$this->assertEquals( $this->slug, $this->image->getSlug() );
		$this->assertEquals( $this->width, $this->image->getWidth() );
		$this->assertEquals( $this->height, $this->image->getHeight() );
	}
}
