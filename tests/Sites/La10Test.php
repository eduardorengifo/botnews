<?php

namespace Tests\Sites;

use BotNews\Models\Author;
use BotNews\Models\Image;
use BotNews\Models\Page;
use BotNews\Models\Post;
use BotNews\Sites\La10;
use PHPUnit\Framework\TestCase;

/**
 * Class La10Test
 * @package Tests\Sites
 */
class La10Test extends TestCase
{
	/**
	 * @var La10
	 */
	private $bot;

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

		$this->bot = new La10();

		$siteUrl = $this->bot->getSiteUrl();
		$postSlug = 'futbol-peruano/peruanos-en-el-extranjero/asi-reacciono-la-prensa-mundial-al-saber-que-paolo-guerrero-jugara-el-mundial-noticia-1095428';

		$authorLogo = new Image('http://s.la10.io/img/la10_destacado4.png');

		$postAuthor = new Author( $siteUrl );
		$postAuthor->setName('La10');
		$postAuthor->setLogo( $authorLogo );

		$postThumbnail = new Image('http://e.la10.io/medium/2017/12/20/portada_485248.jpg');
		$postThumbnail->setWidth(635);
		$postThumbnail->setHeight(357);


		$post = new Post("{$siteUrl}/{$postSlug}");
		$post->setAuthor( $postAuthor );
		$post->setTitle('Así reaccionó la prensa mundial al saber que Paolo Guerrero jugará el Mundial');
		$post->setDescription('La mejor noticia de navidad. FIFA le redujo la sanción de Paolo Guerrero a seis meses y podrá jugar el Mundial Rusia 2018 con la Selección Peruana. El \'Depredador\' había recibido un año de castigo pero reclamaron al Tribunal de Apelación y las pruebas que presentaron fueron contundentes.');
		$post->setContent('La mejor noticia de navidad. FIFA le redujo la sanción de Paolo Guerrero a seis meses y podrá jugar el Mundial Rusia 2018 con la Selección Peruana. El \'Depredador\' había recibido un año de castigo pero reclamaron al Tribunal de Apelación y las pruebas que presentaron fueron contundentes.Los medios más importantes de sudamérica informaron este hecho y todos coincidieron en que era los más justo para el \'Depredador\'. Los abogados de Paolo Guerrero no se quedarán con esta sanción y apelarán ante el TAS para buscar que se le anule todo castigo.Con esta sanción, el atacante peruano podría volver a las actividades futbolísticas el 3 de mayo. Un mes antes de que se juegue el Mundial Rusia 2018. El jugador del Flamengo tendrá que entrenar por su cuenta porque no puede participar de ninguna actividad con la Selección Peruana ni su club.');
		$post->setDatePublished('2017-12-20T13:00:38-05:00');
		$post->setDateModified('2017-12-20T18:36:08-05:00');
		$post->setThumbnail( $postThumbnail );
		$post->setKeywords([
			'Mundial Rusia 2018',
			'Paolo Guerrero',
			'Selección Peruana'
		]);
		$post->setMedia([
			new Image('http://e.la10.io/medium/2017/12/20/portada_485248.jpg'),
			new Image('http://e.la10.io/medium/2017/12/20/539700wgaesgewrjpg.jpg'),
			new Image('http://e.la10.io/medium/2017/12/20/539699rehgerhgerwhgjpg.jpg'),
			new Image('http://e.la10.io/medium/2017/12/20/539698erghergjpg.jpg'),
			new Image('http://e.la10.io/medium/2017/12/20/539697erhgejpg.jpg'),
			new Image('http://e.la10.io/medium/2017/12/20/539696trhresdfjpg.jpg'),
			new Image('http://e.la10.io/medium/2017/12/20/539695rehgerfjpg.jpg'),
			new Image('http://e.la10.io/medium/2017/12/20/539694wgeragjpg.jpg')
		]);
		$this->post = $post;
	}

	/**
	 * return void
	 */
	public function tearDown()
	{
		parent::tearDown();
	}

	/** @test */
	public function testGetPost()
	{
		$post = $this->bot->getPost( $this->post->getSlug() );

		$this->assertInstanceOf( Post::class, $post );
		$this->assertInstanceOf( Author::class, $post->getAuthor() );
		$this->assertInstanceOf( Image::class, $post->getThumbnail() );
		$this->assertInstanceOf( Image::class, $post->getMedia()[0] );

		$this->assertEquals( $this->post, $post );
	}

	/** @test */
	public function testGetPage()
	{
		$pageSlug = '/futbol';
		$page = $this->bot->getPage( $pageSlug );

		$this->assertInstanceOf( Page::class, $page );
		$this->assertInstanceOf( Post::class, $page->getPosts()[0] );

		$this->assertEquals( $pageSlug, $page->getSlug() );
	}
}