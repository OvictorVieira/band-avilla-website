<?php

namespace Library\Helpers;
use Library\Model\Users\ModelUser;

session_start();

class ValidateAcessRegister
{
    public static function validateAcess()
    {
        if(Helper::validadeInput($_POST)) {

            $modelUser = new ModelUser();

            if($modelUser->getLoginUser($_POST['username'], $_POST['password'])) {

                $user = $modelUser->getUser($_POST['username']);

                $_SESSION['user'] = $user->getFullName();
                $_SESSION['logged'] = 'true';
                $_SESSION['password'] = $user->getPassword();
                $_SESSION['email'] = $modelUser->getUser($_POST['username'])->getEmail();

                $name = explode(' ', $modelUser->getUser($_POST['username'])->getFullName());

                $_SESSION['name'] = $name[0] . ' ' . $name[count($name) - 1];

                $_SESSION['user_id'] = $modelUser->getUser($_POST['username'])->getId();
                header('Location: /View/dashboard.php');
            }
            else {
                $_SESSION['messege'] = 'Usuário ou senha inválido.';
                $_SESSION['type_messege'] = 'error';
                header('Location: /View/login.php');
            }
        }
        else{
            $_SESSION['messege'] = 'Informe o usuário e a senha para acessar o sistema.';
            $_SESSION['type_messege'] = 'error';
            header('Location: /View/login.php');
        }
    }

    /**
     * @param $_POST
     */
    public static function validateRegister()
    {
        if(Helper::validadeInput($_POST)) {

            $modelUser = new ModelUser();

            if($modelUser->setUser($_POST['full_name'], $_POST['cpf_number'], $_POST['birth_date'], $_POST['email'], $_POST['password'])) {

                $modelUser = new ModelUser();

                $user = $modelUser->getUser($_POST['email']);

                $_SESSION['user'] = $user->getEmail();
                $_SESSION['password'] = $user->getPassword();
                $_SESSION['logged'] = 'true';

                $name = explode(' ', $user->getFullName());

                $_SESSION['name'] = $name[0] . ' ' . $name[count($name) - 1];

                $_SESSION['email'] = $user->getEmail();

                $_SESSION['user_id'] = $user->getId();

                header('Location: /View/dashboard.php');
            }
            else {
                $_SESSION['messege'] = 'Verfique se os dados foram inseridos corretamente.';
                $_SESSION['type_messege'] = 'error';
                header('Location: /View/login.php');
            }
        }
        else {
            $_SESSION['messege'] = 'Para se registrar é necessário informar todos os dados.';
            $_SESSION['type_messege'] = 'error';
            header('Location: /View/login.php');
        }
    }

    public static function isNotLogged()
    {
        if(!isset($_SESSION['logged'])) {
            header('Location: /View/login.php');
        }
    }

    public static function isLogged()
    {
        if(isset($_SESSION['logged'])) {
            header('Location: /View/dashboard.php');
        }
    }
}