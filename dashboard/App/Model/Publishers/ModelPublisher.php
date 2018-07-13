<?php

namespace Library\Model\Publishers;

use Library\Model\IncConex\SingletonConexDataBase as IncConexDB;
use PDO;
use Library\Classes\Publisher;

class ModelPublisher {

    public function getPublisher($id)
    {
        $sql = "SELECT id, name FROM publishers WHERE id = :id";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->prepare($sql);
        $consult->bindParam(':id', $id);
        $consult->execute();

        $publishers = $consult->fetchAll(PDO::FETCH_ASSOC);

        $publisher = new Publisher();

        if($consult->rowCount() == 1) {

            $publisher->setPublisherName($publishers[0]['name']);
            $publisher->setId($publishers[0]['id']);
        }

        return $publisher;
    }

    public function setPublisher($name)
    {

        $sql = "INSERT INTO publishers (name) VALUES (:name)";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->prepare($sql);
        $consult->bindParam(':name', $name);

        return $consult->execute();
    }

    public function updatePublisher($id, $name)
    {

        $sql = "UPDATE publishers SET name = :name WHERE id = :id";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->prepare($sql);
        $consult->bindParam(':name', $name);
        $consult->bindParam(':id', $id);

        return $consult->execute();
    }

    public function deletePublisher($id)
    {
        $sql = "DELETE FROM publishers WHERE id = :id";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->prepare($sql);
        $consult->bindParam(':id', $id);

        return $consult->execute();
    }

    public function getAllPublisher()
    {
        $sql = "SELECT id, name FROM publishers ORDER BY name";
        $conex = IncConexDB::getConectionDataBase();

        $consult = $conex->query($sql);
        $publishers = $consult->fetchAll(PDO::FETCH_ASSOC);

        $arrayPublisher = [];

        foreach ($publishers as $item) {
            $publisher = new Publisher();

            $publisher->setPublisherName($item['name']);
            $publisher->setId($item['id']);

            $arrayPublisher[] = $publisher;
        }

        return $arrayPublisher;
    }
}














