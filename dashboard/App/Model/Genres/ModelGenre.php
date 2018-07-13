<?php

namespace Library\Model\Genres;

use Library\Model\incConex\SingletonConexDataBase as IncConexDB;
use PDO;
use Library\Classes\Genre;

class ModelGenre
{
    /**
     * @param $id
     * @return Genre
     */
    public function getGenre($id)
    {

        $sql = "SELECT id, name FROM genres WHERE id = :id";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->prepare($sql);
        $consult->bindParam(':id', $id);
        $consult->execute();

        $genres = $consult->fetchAll(PDO::FETCH_ASSOC);

        $genre = new Genre();

        if($consult->rowCount() == 1) {
            $genre->setGenreName($genres[0]['name']);
            $genre->setId($genres[0]['id']);
        }

        return $genre;
    }

    /**
     * @param $name
     * @return bool|mysqli_result
     */
    public function setGenre($name)
    {
        $sql = "INSERT INTO genres (name) VALUES (:name)";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->prepare($sql);
        $consult->bindParam(':name', $name);

        return $consult->execute();
    }

    /**
     * @param $id
     * @param $name
     * @return bool|mysqli_result
     */
    public function updateGenre($id, $name)
    {

        $sql = "UPDATE genres SET name = :name WHERE id = :id";

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
    public function deleteGenre($id)
    {
        $sql = "DELETE FROM genres WHERE id = :id";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->prepare($sql);
        $consult->bindParam(':id', $id);

        return $consult->execute();
    }

    /**
     * @return array
     */
    public function getAllGenres()
    {
        $sql = "SELECT id, name FROM genres ORDER BY name";
        $conex = IncConexDB::getConectionDataBase();

        $consult = $conex->query($sql);

        $queryExec = $consult->fetchAll(PDO::FETCH_ASSOC);

        $arrayGenre = [];

        foreach($queryExec as $item) {
            $genre = new Genre();

            $genre->setGenreName($item['name']);
            $genre->setId($item['id']);
            $arrayGenre[] = $genre;
        }

        return $arrayGenre;
    }
}