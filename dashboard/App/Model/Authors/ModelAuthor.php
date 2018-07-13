<?php

namespace Library\Model\Authors;

use Library\Model\IncConex\SingletonConexDataBase as IncConexDB;
use PDO;
use Library\Classes\Author;

class ModelAuthor
{
    /**
     * @param $name
     * @return bool
     */
    public function setAuthor($name)
    {

        $sql = "INSERT INTO authors (name) VALUES (:name)";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->prepare($sql);
        $consult->bindParam(':name', $name);

        return $consult->execute();
    }

    /**
     * @param $id
     * @return array|null
     */
    public function getAuthor($id)
    {

        $sql = "SELECT name FROM authors WHERE id = :id";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->prepare($sql);
        $consult->bindParam(':id', $id);
        $consult->execute();

        $authors = $consult->fetchAll(PDO::FETCH_ASSOC);

        $author = new Author();

        if($consult->rowCount() == 1) {
            $author->setAuthorName($authors[0]['name']);
            $author->setAuthorId($authors[0]['id']);
        }

        return $author;
    }

    /**
     * @param $id
     * @param $name
     * @return bool|mysqli_result
     */
    public function updateAuthor($id, $name)
    {
        $sql = "UPDATE authors SET name = :name WHERE id = :id";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->prepare($sql);
        $consult->bindParam(':id', $id);
        $consult->bindParam(':name', $name);

        return $consult->execute();
    }

    /**
     * @param $id
     * @return bool|mysqli_result
     */
    public function deleteAuthor($id)
    {
        $sql = "DELETE FROM authors WHERE id = :id";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->prepare($sql);
        $consult->bindParam(':id', $id);

        return $consult->execute();
    }

    /**
     * @return array of Authors
     */
    public function getAllAuthors()
    {

        $sql = "SELECT id, name FROM authors ORDER BY name";
        $conex = IncConexDB::getConectionDataBase();

        $consult = $conex->query($sql);

        $queryExec = $consult->fetchAll(PDO::FETCH_ASSOC);

        $arrayAuthors = [];

        foreach ($queryExec as $item) {
            $author = new Author();
            $author->setFullName($item['name']);
            $author->setId($item['id']);

            $arrayAuthors[] = $author;
        }

        return $arrayAuthors;
    }
}