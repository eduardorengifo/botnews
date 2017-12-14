<?php

namespace BotNews\Helpers;

class Str {
	/**
	 * Reduce Double Slashes
	 *
	 * Converts double slashes in a string to a single slash,
	 * except those found in http://
	 *
	 * http://www.some-site.com//index.php
	 *
	 * becomes:
	 *
	 * http://www.some-site.com/index.php
	 *
	 * @param	string $str
	 *
	 * @return	string
	 */
	static public function reduceDoubleSlashes($str) {
		return preg_replace("#(^|[^:])//+#", "\\1/", $str);
	}

	/**
	 * @param string $str
	 *
	 * @return array
	 */
	static public function explodeSlash($str) {
		return explode('/', $str);
	}

	/**
	 * @param string $str
	 *
	 * @return array
	 */
	static public function explodeComa($str) {
		return explode(',', $str);
	}

	/**
	 * @param string $pathOrUrl
	 * @param string $urlBase
	 *
	 * @return string
	 */
	static public function createUrlValid( $pathOrUrl, $urlBase )
	{
		if ( filter_var($pathOrUrl, FILTER_VALIDATE_URL) )
		{
			return $pathOrUrl;
		}

		return self::reduceDoubleSlashes("{$urlBase}/{$pathOrUrl}");
	}
}