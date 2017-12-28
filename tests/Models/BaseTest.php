<?php

namespace Tests\Models;

use BotNews\Models\Base;
use PHPUnit\Framework\TestCase;

/**
 * Class BaseTest
 * @package Tests\Models
 */
class BaseTest extends TestCase
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
	 * @var Base
	 */
	private $base;

	/**
	 * @return void
	 */
	public function setUp()
	{
		parent::setUp();

		$this->slug = '/base';
		$this->url = "https://wwww.site.com{$this->slug}";

		$this->base = new Base( $this->url );
	}

	/**
	 * @return void
	 */
	public function tearDown()
	{
		parent::tearDown();
	}

	/** @test */
	public function testCanBeCreatedBase()
	{
		$this->assertInstanceOf( Base::class, $this->base );

		$this->assertEquals( $this->url, $this->base->getUrl() );
		$this->assertEquals( $this->slug, $this->base->getSlug() );
	}

}