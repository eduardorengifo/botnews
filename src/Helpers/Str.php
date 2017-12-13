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
}