<?php

namespace Library\Model\Readers;

use Library\Model\IncConex\SingletonConexDataBase as IncConexDB;
use PDO;
use Library\Classes\Reader;

class ModelReader
{
    /**
     * @param $email
     * @param string $id
     * @return Reader
     */
    public function getReader($email, $id = '')
    {
        $conex = IncConexDB::getConectionDataBase();

        if(!empty($id)) {
            $sql = "SELECT id, name, cpf, birth_date, email FROM readers WHERE id = :id";
            $consult = $conex->prepare($sql);
            $consult->bindParam(':id',$id);
        }
        else {
            $sql = "SELECT id, name, cpf, birth_date, email FROM readers WHERE email = :email";
            $consult = $conex->prepare($sql);
            $consult->bindParam(':email',$email);
        }

        $consult->execute();

        $readers = $consult->fetchAll(PDO::FETCH_ASSOC);

        $reader = new Reader();

        if($consult->rowCount() == 1) {
            $reader->setName($readers[0]['name']);
            $reader->setCpf($readers[0]['cpf']);
            $reader->setId($readers[0]['id']);
        }

        return $reader;
    }

    /**
     * @param $name
     * @param $cpf
     * @return bool
     */
    public function setReader($name, $cpf)
    {
        $cpf = preg_replace("/\D+/", "", $cpf);

        $sql = "INSERT INTO readers (name, cpf) VALUES ( :name, :cpf)";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->prepare($sql);
        $consult->bindParam(':name', $name);
        $consult->bindParam(':cpf', $cpf);

        return $consult->execute();
    }

    /**
     * @param $id
     * @param $name
     * @param $cpf
     * @return bool
     */
    public function updateReader($id, $name, $cpf)
    {

        $cpf = preg_replace("/\D+/", "", $cpf);

        $sql = "UPDATE readers SET name = :name, cpf = :cpf WHERE id = :id";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->prepare($sql);
        $consult->bindParam(':name',$name);
        $consult->bindParam(':cpf',$cpf);
        $consult->bindParam(':id',$id);

        return $consult->execute();
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteReader($id) {
        $sql = "DELETE FROM readers WHERE id = :id";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->prepare($sql);
        $consult->bindParam(':id',$id);

        return $consult->execute();
    }

    /**
     * @return array
     */
    public function getAllReader()
    {
        $sql = "SELECT id, name, cpf FROM readers ORDER BY name";

        $conex = IncConexDB::getConectionDataBase();

        $consult = $conex->query($sql);

        $queryExec = $consult->fetchAll(PDO::FETCH_ASSOC);

        $arrayReaders = [];

        foreach ($queryExec as $item) {
            $reader = new Reader();

            $reader->setFullName($item['name']);
            $reader->setCpf($item['cpf']);
            $reader->setId($item['id']);
            $arrayReaders[] = $reader;
        }

        return $arrayReaders;
    }
}