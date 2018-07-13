<?php

namespace Library\Classes;

class Genre
{
    protected $genreName;
    protected $id;

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
}