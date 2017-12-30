<?php

namespace BotNews\Models;

/**
 * Class Author
 * @package BotNews\Models
 */
class Author extends Base
{
	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var Image
	 */
	private $logo;

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName( $name )
	{
		$this->name = $name;
	}

	/**
	 * @return Image
	 */
	public function getLogo()
	{
		return $this->logo;
	}

	/**
	 * @param Image $logo
	 */
	public function setLogo( $logo )
	{
		$this->logo = $logo;
	}
}