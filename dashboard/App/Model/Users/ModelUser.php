<?php

namespace Library\Model\Users;

use Library\Model\IncConex\SingletonConexDataBase as IncConexDB;
use Library\Helpers\Helper;
use PDO;
use Library\Classes\User;

class ModelUser
{
    /**
     * @param $email
     * @return User or False
     */
    public function getUser($email)
    {
        $sql = "SELECT id, name, cpf, birth_date, email, img_name FROM users WHERE email = :email";

        $conex = IncConexDB::getConectionDataBase();
        $consult = $conex->prepare($sql);
        $consult->bindParam(':email', $email);
        $consult->execute();

        $users = $consult->fetchAll(PDO::FETCH_ASSOC);

        $user = new User();

        if($consult->rowCount() == 1) {
            $user->setFullName($users[0]['name']);
            $user->setCpf($users[0]['cpf']);
            $user->setBirthDate($users[0]['birth_date']);
            $user->setEmail($users[0]['email']);
            $user->setId($users[0]['id']);

            $user->setImage($users[0]['img_name']);
        }

        return $user;
    }

    /**
     * @param $fullName
     * @param $cpf
     * @param $bithDate
     * @param $email
     * @param $passwordUser
     * @return bool|mysqli_result
     */
    public function setUser($fullName, $cpf, $bithDate, $email, $passwordUser)
    {
        $cpf = Helper::Unmasking($cpf);
        $bithDate = Helper::dateFormat($bithDate, 'd/m/Y', 'Y-m-d');

        $sql = "INSERT INTO users (name, cpf, birth_date, email, password) VALUES ( :name, :cpf, :birth_date, :email, :password)";

        $conex = IncConexDB::getConectionDataBase();

        $consult = $conex->prepare($sql);

        $consult->bindParam(':name', $fullName);
        $consult->bindParam(':cpf', $cpf);
        $consult->bindParam(':birth_date', $bithDate);
        $consult->bindParam(':email', $email);
        $consult->bindParam(':password', Helper::cryptography($passwordUser));

        return $consult->execute();
    }

    /**
     * @param $email
     * @param $passwordUser
     * @return bool
     */
    public function getLoginUser($email, $passwordUser)
    {
        $password = Helper::cryptography($passwordUser);


        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";

        $conex = IncConexDB::getConectionDataBase();

        $consult = $conex->prepare($sql);
        $consult->bindParam(':email', $email);
        $consult->bindParam(':password',$password);
        $consult->execute();

        $users = $consult->fetchAll(PDO::FETCH_ASSOC);

        if(count($users) == 1) {
            $modelUser = new ModelUser();
            $_SESSION['nome'] = $modelUser->getUser($email)->getFullName();

            return true;
        }

        return false;
    }

    /**
     * @param $id
     * @param $fullName
     * @param $cpf
     * @param $bithDate
     * @param $email
     * @param $passwordUser
     * @return bool|mysqli_result
     */
    public function updateUser($id, $fullName, $cpf, $bithDate, $email, $passwordUser, $imgUser)
    {
        $cpf = Helper::Unmasking($cpf);
        $bithDate = Helper::dateFormat($bithDate, 'd/m/Y', 'Y-m-d');

        $conex = IncConexDB::getConectionDataBase();

        if(!empty($passwordUser) && empty($imgUser)) {
            $sql = "UPDATE users SET name = :name, cpf = :cpf, birth_date = :birth_date, email = :email, password = :password WHERE id = :id";

            $consult = $conex->prepare($sql);

            $consult->bindParam(':name', $fullName);
            $consult->bindParam(':cpf', $cpf);
            $consult->bindParam(':birth_date', $bithDate);
            $consult->bindParam(':email', $email);
            $consult->bindParam(':password', Helper::cryptography($passwordUser));
            $consult->bindParam(':id', $id);
        }
        elseif (!empty($imgUser) && empty($passwordUser)){
            $sql = "UPDATE users SET name = :name, cpf = :cpf, birth_date = :birth_date, email = :email, img_name = :img_name WHERE id = :id";

            $consult = $conex->prepare($sql);

            $consult->bindParam(':name', $fullName);
            $consult->bindParam(':cpf', $cpf);
            $consult->bindParam(':birth_date', $bithDate);
            $consult->bindParam(':email', $email);
            $consult->bindParam(':img_name', $imgUser);
            $consult->bindParam(':id', $id);
        }
        elseif (!empty($imgUser) && !empty($passwordUser)){
            $sql = "UPDATE users SET name = :name, cpf = :cpf, birth_date = :birth_date, email = :email, password = :password, img_name = :img_name WHERE id = :id";

            $consult = $conex->prepare($sql);

            $consult->bindParam(':name', $fullName);
            $consult->bindParam(':cpf', $cpf);
            $consult->bindParam(':birth_date', $bithDate);
            $consult->bindParam(':email', $email);
            $consult->bindParam(':password', Helper::cryptography($passwordUser));
            $consult->bindParam(':img_name', $imgUser);
            $consult->bindParam(':id', $id);
        }
        else {
            $sql = "UPDATE users SET name = :name, cpf = :cpf, birth_date = :birth_date, email = :email WHERE id = :id";

            $consult = $conex->prepare($sql);

            $consult->bindParam(':name', $fullName);
            $consult->bindParam(':cpf', $cpf);
            $consult->bindParam(':birth_date', $bithDate);
            $consult->bindParam(':email', $email);
            $consult->bindParam(':id', $id);
        }

        return $consult->execute();
    }

    /**
     * @param $id
     * @return bool|mysqli_result
     */
    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";

        $conex = IncConexDB::getConectionDataBase();

        $consult = $conex->prepare($sql);
        $consult->bindParam(':id', $id);

        return $consult->execute();
    }

    /**
     * @return array of Users
     */
    public function getAllUser()
    {
        $sql = "SELECT id, name, cpf, birth_date, email FROM users ORDER BY name";
        $conex = IncConexDB::getConectionDataBase();

        $consult = $conex->query($sql);

        $queryExec = $consult->fetchAll(PDO::FETCH_ASSOC);

        $arrayUsers = [];

        foreach ($queryExec as $item) {
            $user = new User();

            $user->setFullName($item['name']);
            $user->setCpf($item['cpf']);
            $user->setBirthDate($item['birth_date']);
            $user->setEmail($item['email']);
            $user->setId($item['id']);
            $arrayUsers[] = $user;
        }

        return $arrayUsers;
    }
}














