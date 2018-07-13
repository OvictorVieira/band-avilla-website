<?php

namespace Library\Classes;

class Book
{
    protected $id;
    protected $title;
    protected $publicationDate;
    protected $authorName;
    protected $authorId;
    protected $genreName;
    protected $genreId;
    protected $publisherName;
    protected $publisherId;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * @param mixed $publicationDate
     */
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;
    }

    /**
     * @return mixed
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * @param mixed $authorName
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * @param mixed $authorId
     */
    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
    }

    /**
     * @return mixed
     */
    public function getGenreName()
    {
        return $this->genreName;
    }

    /**
     * @param mixed $genreName
     */
    public function setGenreName($genreName)
    {
        $this->genreName = $genreName;
    }

    /**
     * @return mixed
     */
    public function getGenreId()
    {
        return $this->genreId;
    }

    /**
     * @param mixed $genreId
     */
    public function setGenreId($genreId)
    {
        $this->genreId = $genreId;
    }

    /**
     * @return mixed
     */
    public function getPublisherName()
    {
        return $this->publisherName;
    }

    /**
     * @param mixed $publisherName
     */
    public function setPublisherName($publisherName)
    {
        $this->publisherName = $publisherName;
    }

    /**
     * @return mixed
     */
    public function getPublisherId()
    {
        return $this->publisherId;
    }

    /**
     * @param mixed $publisherId
     */
    public function setPublisherId($publisherId)
    {
        $this->publisherId = $publisherId;
    }
}