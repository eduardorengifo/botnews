<?php

namespace BotNews\Helpers;

use BotNews\Models\Author;
use BotNews\Models\Image;
use BotNews\Models\Post;

/**
 * Class JsonLD
 * @package BotNews\Helpers
 */
class JsonLD
{

	/**
	 * @param array $jsonLD
	 *
	 * @return Post
	 */
	static public function article( array $jsonLD )
	{
		$post = new Post( @$jsonLD['url'] );
		$post->setTitle( @$jsonLD['headline'] );
		$post->setDescription( @$jsonLD['description'] );
		$post->setContent( @$jsonLD['articleBody'] );
		$post->setDatePublished( @$jsonLD['datePublished'] );
		$post->setDateModified( @$jsonLD['dateModified'] );

		if ( isset( $jsonLD['publisher'] )
		     AND ! empty( $jsonLD['publisher'] ) ) {
			$author = self::organization( $jsonLD['publisher'] );
			$post->setAuthor( $author );
		}

		if ( isset( $jsonLD['image'] ) ) {
			$thumbnail = self::imageObject( $jsonLD['image'] );
			$post->setThumbnail( $thumbnail );
		}

		if ( isset( $jsonLD['associatedMedia'] )
		     AND ! empty( $jsonLD['associatedMedia'] ) ) {
			$media = array_map( function ( $image ) {
				return self::imageObject( $image );
			}, $jsonLD['associatedMedia'] );
			$post->setMedia( $media );
		}

		if ( isset( $jsonLD['keywords'] )
		     AND ! empty( $jsonLD['keywords'] ) ) {
			$keywords = Str::explodeComa( $jsonLD['keywords'] );
			$post->setKeywords( $keywords );
		}

		return $post;
	}

	/**
	 * @param array $jsonLD
	 *
	 * @return Author
	 */
	static public function organization( array $jsonLD )
	{
		$author = new Author( @$jsonLD['url'] );
		$author->setName( @$jsonLD['name'] );

		if ( isset( $jsonLD['logo'] )
		     AND ! empty( $jsonLD['logo'] ) ) {
			$logo = self::imageObject( $jsonLD['logo'] );
			$author->setLogo( $logo );
		}

		return $author;
	}

	/**
	 * @param array $jsonLD
	 *
	 * @return Image
	 */
	static public function imageObject( array $jsonLD )
	{
		$image_url = null;

		if ( isset( $jsonLD['Url'] )
		     AND ! empty( $jsonLD['Url'] ) ) {
			$image_url = @$jsonLD['Url'];
		} elseif ( isset( $jsonLD['contentUrl'] )
		           AND ! empty( $jsonLD['contentUrl'] ) ) {
			$image_url = @$jsonLD['contentUrl'];
		} elseif ( isset( $jsonLD['url'] )
		           AND ! empty( $jsonLD['url'] ) ) {
			$image_url = @$jsonLD['url'];
		}

		$image = new Image( $image_url );

		if ( isset( $jsonLD['width'] )
		     AND ! empty( $jsonLD['width'] )
		         AND isset( $jsonLD['width']['name'] ) ) {
			$width = (int) $jsonLD['width']['name'];
			$image->setWidth($width);
		}

		if ( isset( $jsonLD['height'] )
		     AND ! empty( $jsonLD['height'] )
		         AND isset( $jsonLD['height']['name'] ) ) {
			$height = (int) $jsonLD['height']['name'];
			$image->setHeight( $height );
		}

		return $image;
	}
}