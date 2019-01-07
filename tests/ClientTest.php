<?php

namespace Tests;

use BotNews\Client;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class ClientTest
 * @package Tests
 */
class ClientTest extends TestCase
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $url;

    /**
     * @var array
     */
    private $arr_expected;

    /**
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->client = new Client();
        $this->url = 'https://rpp.pe/futbol/descentralizado/luis-tejada-es-flamante-contratacion-de-sport-boys-del-callao-noticia-1097085';
        $json_expected = '{"@context":"http:\/\/schema.org","@type":"Article","url":"https:\/\/rpp.pe\/futbol\/descentralizado\/luis-tejada-es-flamante-contratacion-de-sport-boys-del-callao-noticia-1097085","publisher":{"@type":"Organization","name":"RPP","url":"http:\/\/rpp.pe","logo":{"@type":"ImageObject","Url":"http:\/\/s.rpp-noticias.io\/images\/rpp-noticias.png","width":{"@type":"Intangible","name":"452"},"height":{"@type":"Intangible","name":"150"}},"sameAs":["https:\/\/www.facebook.com\/rppnoticias","https:\/\/twitter.com\/rppnoticias","https:\/\/plus.google.com\/113482325785133390225","https:\/\/www.youtube.com\/user\/RPPNOTICIAS","https:\/\/es.wikipedia.org\/wiki\/Radio_Programas_del_Per%C3%BA"]},"articleSection":"F\u00fatbol","headline":"Luis Tejada es el nuevo jugador del Sport Boys del Callao | noticia | Sport Boys | Fútbol | RPP Noticias","alternativeHeadline":"Luis Tejada es el nuevo jugador del Sport Boys del Callao","author":"Redacci\u00f3n RPP Noticias","mainEntityOfPage":"https:\/\/rpp.pe\/futbol\/descentralizado\/luis-tejada-es-flamante-contratacion-de-sport-boys-del-callao-noticia-1097085","description":"El \'Pana\' lleg\u00f3 al Callao, a un puerto lleno de salsa y f\u00fatbol. Sport Boys hizo oficial en sus redes sociales la incorporaci\u00f3n del atacante Luis Tejada con 35 a\u00f1os de edad y con una marca de 18 goles en el Descentralizado 2017 con la camiseta de Universitario de Deportes.","articleBody":"El \'Pana\' lleg\u00f3 al Callao, a un puerto lleno de salsa y f\u00fatbol. Sport Boys hizo oficial en sus redes sociales la incorporaci\u00f3n del atacante Luis Tejada con 35 a\u00f1os de edad y con una marca de 18 goles en el Descentralizado 2017 con la camiseta de Universitario de Deportes.El atacante vestir\u00e1 la cuarta camiseta peruana de su carrera y buscar\u00e1 enamorar a la afici\u00f3n porte\u00f1a que est\u00e1 ilusionada con la vuelta a Primera Divisi\u00f3n.Johan V\u00e1squez, administrador del club, habl\u00f3 con RPP y revel\u00f3 que el v\u00ednculo con el atacante ser\u00e1 por todo el 2018 y as\u00ed rompen el mercado antes de las celebraciones de A\u00f1o Nuevo.Luis Tejada jug\u00f3 en Juan Aurich, C\u00e9sar Vallejo y Universitario de Deportes antes de ser presentado como refuerzo de la \'Rosada\'. En total, el \'Pana\' acumula 116 goles en 7 temporadas que disput\u00f3 en el f\u00fatbol peruano.Sport Boys del Callao se ha reforzado con varios jugadores con pasado crema, entre ellos Josimar Vargas y Juan Diego Guti\u00e9rrez. Tambi\u00e9n llegaron Maxi Velasco y Emiliano Ciucci, renov\u00f3 el mexicano Carlos Ambr\u00edz, el colombiano Johnnier Monta\u00f1o y Alejandro Ramos.","keywords":"Sport Boys,Luis Tejada,Fichajes","associatedMedia":[{"@type":"ImageObject","contentUrl":"https:\/\/e.rpp-noticias.io\/medium\/2017\/12\/29\/portada_505250.jpg"},{"@type":"ImageObject","contentUrl":"https:\/\/e.rpp-noticias.io\/medium\/2017\/12\/29\/54434920507327-10155618780110701-7023855709755343359-ojpg.jpg"},{"@type":"ImageObject","contentUrl":"https:\/\/e.rpp-noticias.io\/medium\/2017\/12\/29\/54435024131998-10155986496670701-45542702684159107-ojpg.jpg"}],"image":{"@type":"ImageObject","Url":"https:\/\/e.rpp-noticias.io\/medium\/2017\/12\/29\/portada_505250.jpg","width":{"@type":"Intangible","name":"635"},"height":{"@type":"Intangible","name":"357"}},"aggregateRating":{"@type":"AggregateRating","ratingValue":"5","ratingCount":"1","bestRating":"5","worstRating":"1"},"datePublished":"2017-12-29T22:08:24-05:00","dateModified":"2018-01-04T15:06:53-05:00","sameAs":["http:\/\/rpp.pe\/futbol\/descentralizado\/luis-tejada-me-veo-fuera-de-universitario-noticia-1095831"]}';
        $this->arr_expected = json_decode ( $json_expected , TRUE );
    }

    /**
     * return void
     */
    public function tearDown()
    {
        parent::tearDown();
    }

    /** @test */
    public function testRequestJsonLD()
    {
        $arr = $this->client->requestJsonLD( $this->url );
        $this->assertEquals( $this->arr_expected, $arr );
    }

    /** @test */
    public function testGetJsonLD()
    {
        $crawler = $this->client->requestSanitize( $this->url );
        $arr = $this->client->getJsonLD( $crawler );
        $this->assertEquals( $this->arr_expected, $arr );
    }

    /** @test */
    public function testRequestSanitize()
    {
        $crawler = $this->client->requestSanitize( $this->url );
        $this->assertInstanceOf( Crawler::class, $crawler );
    }
}
