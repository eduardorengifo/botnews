<?php

namespace BotNews\Models;

/**
 * Class Base
 * @package BotNews\Models
 */
class Base
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
     * Base constructor.
     *
     * @param string $url
     */
    public function __construct( $url )
    {
        if ( filter_var( $url, FILTER_VALIDATE_URL ) ) {
        	$this->url = $url;
        	$parse_url = parse_url( $this->url );

            if ( isset( $parse_url['path'] )
                 &&  ! empty( $parse_url['path'] ) ) {
                $this->slug = $parse_url['path'];
            }
        }
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl( $url )
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug( $slug )
    {
        $this->slug = $slug;
    }
}
