# BotNews

[![Build Status](https://travis-ci.org/eduardorengifo/botnews.svg?branch=master)](https://travis-ci.org/eduardorengifo/botnews)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![Packagist Pre Release](https://img.shields.io/badge/packagist-v1.0.0-orange.svg)](https://packagist.org/packages/eduardorengifo/botnews)
[![PHP from Packagist](https://img.shields.io/badge/PHP-%5E5.5.0-blue.svg)]()

Botnews is a small PHP script to extract news from websites.

## Installation

To install, use the following to pull the package in via Composer.

```
$ composer require eduardorengifo/botnews
```

## Configuration

At the moment there are only two news sites configured.
The same settings could be applied for all other available sites.

```php
require_once __DIR__ . '/vendor/autoload.php';

$rppPostSlug = 'futbol/seleccion-peruana/video-ricardo-gareca-para-rpp-tenemos-que-tener-los-pies-sobre-la-tierra-en-el-mundial-noticia-1096914';
$rpp = new \BotNews\Sites\Rpp();

/** @var \BotNews\Models\Post $rppPost */
$rppPost = $rpp->getPost( $rppPostSlug );

/** @var \BotNews\Models\Page $rppPage */
$rppPage = $rpp->getPage('futbol');
```

## Extend

To set up your own news site using the classes, models and BotNews interface you could use the following template.

```php
use BotNews\BotNews;
use BotNews\Client;

class SiteName extends Client implements BotNews
{
	/**
	 * @var string
	 */
	protected $siteUrl = ''; // TODO: Place the web site url

	/**
	 * @param string $slug
	 *
	 * @return Post
	 */
	public function getPost( $slug )
	{
		// TODO: Your code configuration for post
	};

	/**
	 * @param mixed $paged
	 *
	 * @return Page
	 */
	public function getPage( $paged = 1 )
	{
		// TODO: Your code configuration for page
	};
}
```

## License

BotNews is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
