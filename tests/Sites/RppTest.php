<?php

namespace Tests\Sites;

use BotNews\Models\Author;
use BotNews\Models\Image;
use BotNews\Models\Page;
use BotNews\Models\Post;
use BotNews\Sites\Rpp;
use PHPUnit\Framework\TestCase;

/**
 * Class Rpp
 * @package Tests\Sites
 */
class RppTest extends TestCase
{
	/**
	 * @var Rpp
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

		$this->bot = new Rpp();

		$siteUrl = $this->bot->getSiteUrl();
		$postSlug = 'futbol/seleccion-peruana/video-ricardo-gareca-para-rpp-tenemos-que-tener-los-pies-sobre-la-tierra-en-el-mundial-noticia-1096914';

		$authorLogo = new Image('http://s.rpp-noticias.io/images/rpp-noticias.png');
		$authorLogo->setWidth(452);
		$authorLogo->setHeight(150);

		$postAuthor = new Author( $siteUrl );
		$postAuthor->setName('RPP Noticias');
		$postAuthor->setLogo( $authorLogo );

		$postThumbnail = new Image('http://e.rpp-noticias.io/medium/2017/12/28/portada_010001.jpg');
		$postThumbnail->setWidth(635);
		$postThumbnail->setHeight(357);


		$post = new Post("{$siteUrl}/{$postSlug}");
		$post->setAuthor( $postAuthor );
		$post->setTitle('Ricardo Gareca para RPP: "Tenemos que tener los pies sobre la tierra en el Mundial"');
		$post->setDescription('Ricardo Gareca es el personaje más querido por los peruanos luego de meter a Perú a un Mundial luego de casi 36 años. El \'Tigre\' brindó una entrevista exclusiva al jefe de deportes de RPP, Pierre Manrique, en el programa \'Mano a Mano\' donde contó algunas anécdotas, temas puntuales como Paolo Guerrero, Claudio Pizarro y la proyección de la campaña de La Bicolor en Rusia 2018.');
		$post->setContent('Ricardo Gareca es el personaje más querido por los peruanos luego de meter a Perú a un Mundial luego de casi 36 años. El \'Tigre\' brindó una entrevista exclusiva al jefe de deportes de RPP, Pierre Manrique, en el programa \'Mano a Mano\' donde contó algunas anécdotas, temas puntuales como Paolo Guerrero, Claudio Pizarro y la proyección de la campaña de La Bicolor en Rusia 2018.La hazaña de meter a Perú en un MundialRG: "Uno hace un análisis y dice cuesta tanto ganar algo, conseguir algo y cuando uno lo logra conseguir, uno no puede no acordarse de lo que ganó. Fueron momentos muy particulares y lo vivido ahora fue muy fuerte por el tiempo, el pueblo. Vi todo un país emocionado y que lo disfrutó de una manera tan intensa".Dirigir un MundialRG: "Es la ambición de todo entrenador dirigir un Mundial y espero estar a la altura. Perú me dio la posibilidad de dirigir por primera vez una selección y una cosa es prepararse y otra vivirla con tu propia experiencia".La crítica que recibió al inicio de las EliminatoriasRG: "Yo acostumbro cumplir los contratos, uno lo hace con la mayor responsabilidad y lo llevo a cabo hasta el último momento y si no lograba el objetivo tenía que terminarlo de la mejor manera".Diego Maradona RG: "Maradona es el mejor jugador que yo vi en mi vida dentro de un campo de juego. Yo conocí un Maradona espectacular. Yo concentré con él, conocí a la persona y si bien no tengo un contacto permanente, siempre ha quedado de parte mía y de él para conmigo un cariño muy particular. Lo admiro como futbolista y a nivel persona conocí la parte más noble de él".Lionel MessiRG: "Messi es el mejor del mundo para mí. A Messi se le disfruta en la televisión y se le sufre en el campo de juego".¿Cómo hacer un gran papel en Rusia 2018?RG: "Tenemos que tener los pies sobre la tierra. Si logramos capitalizar toda esta experiencia que nos tocó vivir como grupo, si entendemos que somos una selección que necesita crecer y aprender. Con el tiempo de trabajo que tenemos podemos volvernos una selección competitiva".Paolo Guerrero y el resultado analítico adversoRG: "Traté de ponerme en la piel de él, comunicarme con él y manifestarle el apoyo, pero traté que no me golpeara y traté de sacarme el tema y que no afecte al grupo emocionalmente porque no teníamos tiempo. Se nos venían los 2 partidos y si nos quedábamos en el tema de Paolo Guerrero, se perdía todo y tenía que enfocarme en la definición. Eso no significa que no esté pendiente de él y le de mi apoyo, a la FPF le pedí lo mismo y a los muchachos le pedí lo mismo. Pasara lo que pasara, no me interesa tampoco; me interesa lo que Paolo me mostró, su profesionalismo, su calidad de persona, lo que es él".Claudio PizarroRG: "El profesionalismo lo tiene y está fuera de discusión, pero tengo que ver el presente. El homenaje a Claudio Pizarro ojalá se lo brindé la Selección en su debido momento".Dirigir a la Selección de ArgentinaRG: "Uno no debe perder determinadas metas y anhelos, pero en mi profesión me he acostumbrado a no ilusionarme y a vivir el presente. La Selección Argentina en qué momento se puede producir si hay un técnico que acaban de contratar y es Jorge Sampaoli. Acostumbro a vivir el presente y mi presente es la Selección Peruana, estoy enfocado en Perú".Aquí la entrevista completa de Pierre Manrique a Ricardo Gareca');
		$post->setDatePublished('2017-12-28T23:20:25-05:00');
		$post->setDateModified('1969-12-31T19:00:00-05:00');
		$post->setThumbnail( $postThumbnail );
		$post->setKeywords([
			'Ricardo Gareca',
			'Selección Peruana'
		]);
		$post->setMedia([
			new Image('http://e.rpp-noticias.io/medium/2017/12/28/portada_010001.jpg'),
			new Image('http://e.rpp-noticias.io/medium/2017/12/28/543763598d37b4432efjpg.jpg'),
			new Image('http://e.rpp-noticias.io/medium/2017/12/28/543765img-odotras-20171201-170908-imagenes-lv-otras-fuentes-captura2-3-kn0h-u433332673231hab-992x558lavanguardia-webjpg.JPG')
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