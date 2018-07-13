<?php

namespace Library\Model\Users;

@session_start();

use Library\Helpers\Helper;

class RequisitionsUsers
{
    public static function createUsers()
    {
        if(Helper::validadeInput($_POST)) {

            $modelUser = new ModelUser();

            if($modelUser->setUser($_POST['full_name'], $_POST['cpf_number'], $_POST['birth_date'], $_POST['email'], $_POST['password'])) {
                $_SESSION['messege'] = 'Usuário cadastrado com sucesso.';
                $_SESSION['type_messege'] = 'sucess';
            }
            else {

                $_SESSION['messege'] = 'Erro ao cadastrar usuário. Verifique se os dados foram preenchidos corretamente.';
                $_SESSION['type_messege'] = 'error';
            }
        }
        else {
            $_SESSION['messege'] = 'Verifique se todos os dados foram preenchidos corretamente.';
            $_SESSION['type_messege'] = 'error';
        }

        header('Location: /View/user/users.php');
    }

    // Edição de Usuparios
    public static function updateUsers()
    {
        if(Helper::validadeInput($_POST) || empty($_POST['password'])) {

            $modelUser = new ModelUser();

            if(isset($_FILES['img_user'])) {

                $arrayAnswer = Helper::imageUpload();

                if($arrayAnswer['sucess']) {
                    $imageName = $arrayAnswer['file_name'];
                }
                else {
                    $_SESSION['messege'] = $arrayAnswer['messege'];
                    $_SESSION['type_messege'] = 'error';

                    header('Location: /View/user/users.php');
                }
            }

            if($modelUser->updateUser($_POST['update_id'], $_POST['full_name'], $_POST['cpf_number'], $_POST['birth_date'], $_POST['email'], $_POST['password'], $imageName)) {
                $_SESSION['messege'] = 'Dados atualizados com sucesso.';
                $_SESSION['type_messege'] = 'sucess';

            }
            else {
                $_SESSION['messege'] = 'Erro ao atualizar dados do usuário. Verifique se os dados foram preenchidos corretamente.';
                $_SESSION['type_messege'] = 'error';
            }

        }
        else {
            $_SESSION['messege'] = 'Verifique se todos os dados foram preenchidos corretamente.';
            $_SESSION['type_messege'] = 'error';
        }

        header('Location: /View/user/users.php');
    }

    // Exclusão de Usuparios
    public static function deleteUsers()
    {
        if(Helper::validadeInput($_GET)) {

            $modelUser = new ModelUser();

            if($modelUser->deleteUser($_GET['delete_id'])) {
                $_SESSION['messege'] = 'Usuário <strong>' . $_GET['name'] . '</strong> excluido com sucesso.';
                $_SESSION['type_messege'] = 'sucess';
            }
            else {
                $_SESSION['messege'] = 'Erro ao excluir usuário <strong>'.$_GET['name'].'</strong>. Verifique se o mesmo não possui locações vinculadas a ele.';
                $_SESSION['type_messege'] = 'error';
            }
        }
        else {
            $_SESSION['messege'] = 'Erro ao excluir usuário <strong>' . $_GET['name'] . '</strong>, tente novamente.';
            $_SESSION['type_messege'] = 'error';
        }
        header('Location: /View/user/users.php');
    }
}
