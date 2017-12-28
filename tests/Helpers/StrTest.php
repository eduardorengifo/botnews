<?php

namespace Tests\Helpers;

use BotNews\Helpers\Str;
use PHPUnit\Framework\TestCase;

/**
 * Class StrTest
 * @package Tests\Helpers
 */
class StrTest extends TestCase
{
	/** @test */
	public function testReduceDoubleSlashes()
	{
		$url = 'https://www.site.com//index.php';
		$url_expected = 'https://www.site.com/index.php';
		$this->assertEquals( $url_expected, Str::reduceDoubleSlashes( $url ) );
	}

	/** @test */
	public function testExplodeSlash()
	{
		$str = 'item1/item2/item3';
		$arr = Str::explodeSlash( $str );
		$this->assertEquals( 'item1', $arr[0] );
		$this->assertEquals( 'item2', $arr[1] );
		$this->assertEquals( 'item3', $arr[2] );
	}

	/** @test */
	public function testExplodeComa()
	{
		$str = 'item1,item2,item3';
		$arr = Str::explodeComa( $str );
		$this->assertEquals( 'item1', $arr[0] );
		$this->assertEquals( 'item2', $arr[1] );
		$this->assertEquals( 'item3', $arr[2] );
	}

	/** @test */
	public function testCreateUrlValid()
	{
		$siteUrl = 'https://www.site.com';
		$path = '/page';
		$pageUrl = $siteUrl . $path;

		$validUrlByPath = Str::createUrlValid( $path, $siteUrl );
		$this->assertEquals( $pageUrl, $validUrlByPath );

		$validUrlBbySiteUrl = Str::createUrlValid( $pageUrl, $siteUrl);
		$this->assertEquals( $pageUrl, $validUrlBbySiteUrl );
	}
}
