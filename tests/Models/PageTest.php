<?php

namespace Tests\Models;

use BotNews\Models\Page;
use BotNews\Models\Post;
use PHPUnit\Framework\TestCase;

/**
 * Class PageTest
 * @package Tests\Models
 */
class PageTest extends TestCase
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
     * @var Page
     */
    private $page;

    /**
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->paged = 1;
        $this->pagedFinal = 1;
        $siteUrl = 'https://site.com';
        $this->slug = '/page';
        $this->url = $siteUrl . $this->slug;

        $this->posts = array_map( function ( $num ) use ( $siteUrl ) {
            $url = "{$siteUrl}/$num";
            $post = new Post($url);
            $post->setTitle("Title {$num}");
            return $post;
        }, range( 1, 10 ) );

        $page = new Page($this->url);
        $page->setPaged($this->paged);
        $page->setPagedFinal($this->pagedFinal);
        $page->setPosts($this->posts);
        $this->page = $page;
    }

    /**
     * return void
     */
    public function tearDown()
    {
        parent::tearDown();
    }

    /** @test */
    public function testCanBeCreatedPage()
    {
        $this->assertInstanceOf( Page::class, $this->page );
        $this->assertInstanceOf( Post::class, $this->page->getPosts()[0] );

        $this->assertEquals( $this->paged, $this->page->getPaged() );
        $this->assertEquals( $this->pagedFinal, $this->page->getPagedFinal() );
        $this->assertEquals( $this->url, $this->page->getUrl() );
        $this->assertEquals( $this->slug, $this->page->getSlug() );
    }
}
