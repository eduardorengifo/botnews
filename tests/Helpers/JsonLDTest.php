<?php

namespace Tests\Helpers;

use BotNews\Helpers\JsonLD;
use BotNews\Models\Author;
use BotNews\Models\Image;
use BotNews\Models\Post;
use PHPUnit\Framework\TestCase;

/**
 * Class JsonLDTest
 * @package Tests\Helpers
 */
class JsonLDTest extends TestCase
{
    /** @test */
    public function testArticle()
    {
        $post = JsonLD::article([]);
        $this->assertInstanceOf( Post::class, $post );
    }

    /** @test */
    public function testOrganization()
    {
        $author = JsonLD::organization([]);
        $this->assertInstanceOf( Author::class, $author );
    }

    /** @test */
    public function testImageObject()
    {
        $image = JsonLD::imageObject([]);
        $this->assertInstanceOf( Image::class, $image );
    }
}
