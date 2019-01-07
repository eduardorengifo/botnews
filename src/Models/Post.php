<?php

namespace BotNews\Models;

/**
 * Class Post
 * @package BotNews\Models
 */
class Post extends Base
{
    /**
     * @var Author
     */
    private $author;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $datePublished;

    /**
     * @var string
     */
    private $dateModified;

    /**
     * @var Image
     */
    private $thumbnail;

    /**
     * @var Image[]
     */
    private $media;

    /**
     * @var string[]
     */
    private $keywords;

    /**
     * @return Author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param Author $author
     */
    public function setAuthor( $author )
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle( $title )
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription( $description )
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent( $content )
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getDatePublished()
    {
        return $this->datePublished;
    }

    /**
     * @param string $datePublished
     */
    public function setDatePublished( $datePublished )
    {
        $this->datePublished = $datePublished;
    }

    /**
     * @return string
     */
    public function getDateModified()
    {
        return $this->dateModified;
    }

    /**
     * @param string $dateModified
     */
    public function setDateModified( $dateModified )
    {
        $this->dateModified = $dateModified;
    }

    /**
     * @return Image
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param Image $thumbnail
     */
    public function setThumbnail( $thumbnail )
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return Image[]
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param Image[] $media
     */
    public function setMedia( $media )
    {
        $this->media = $media;
    }

    /**
     * @return string[]
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param string[] $keywords
     */
    public function setKeywords( $keywords )
    {
        $this->keywords = $keywords;
    }
}
