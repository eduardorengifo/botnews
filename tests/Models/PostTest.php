<?php

namespace Tests\Models;

use BotNews\Models\Author;
use BotNews\Models\Image;
use BotNews\Models\Post;
use PHPUnit\Framework\TestCase;

/**
 * Class PostTest
 * @package Tests\Models
 */
class PostTest extends TestCase
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
     * @var Author
     */
    private $author;

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
    private $datePublished;

    /**
     * @var string
     */
    private $dateModified;

    /**
     * @var Image
     */
    private $thumbnail;

    /**
     * @var Image[]
     */
    private $media;

    /**
     * @var string[]
     */
    private $keywords;

    /**
     * @var Post
     */
    private $post;

    /**
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $siteUrl = 'https://www.site.com';

        $this->slug = '/post';
        $this->url = $siteUrl . $this->slug;
        $this->author = new Author(null);
        $this->title = 'title';
        $this->description = 'description';
        $this->content = 'content';
        $this->datePublished = '2017';
        $this->dateModified = '2017';
        $this->thumbnail = new Image("{$siteUrl}/images/thumbnail.png");
        $this->media = array_map( function () {
            return new Image(null);
        }, range(0, 10) );
        $this->keywords = [
            'item1',
            'item2',
            'item3'
        ];

        $post = new Post( $this->url );
        $post->setAuthor( $this->author );
        $post->setTitle( $this->title );
        $post->setDescription( $this->description );
        $post->setThumbnail( $this->thumbnail );
        $post->setContent( $this->content );
        $post->setDatePublished( $this->datePublished );
        $post->setDateModified( $this->dateModified );
        $post->setMedia( $this->media );
        $post->setKeywords( $this->keywords );
        $this->post = $post;
    }

    /**
     * @return void
     */
    public function tearDown()
    {
        parent::tearDown();
    }

    /** @test */
    public function testCanBeCreatedPost()
    {
        $this->assertInstanceOf( Post::class, $this->post );
        $this->assertInstanceOf( Author::class, $this->post->getAuthor() );
        $this->assertInstanceOf( Image::class, $this->post->getThumbnail() );
        $this->assertInstanceOf( Image::class, $this->post->getMedia()[0] );

        $this->assertEquals( $this->url, $this->post->getUrl() );
        $this->assertEquals( $this->slug, $this->post->getSlug() );
        $this->assertEquals( $this->title, $this->post->getTitle() );
        $this->assertEquals( $this->description, $this->post->getDescription() );
        $this->assertEquals( $this->content, $this->post->getContent() );
        $this->assertEquals( $this->datePublished, $this->post->getDatePublished() );
        $this->assertEquals( $this->dateModified, $this->post->getDateModified() );
        $this->assertEquals( $this->thumbnail->getUrl(), $this->post->getThumbnail()->getUrl() );
        $this->assertEquals( $this->keywords[0], $this->post->getKeywords()[0] );
    }
}
