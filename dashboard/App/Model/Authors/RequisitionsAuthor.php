<?php

namespace Library\Model\Authors;

@session_start();

use Library\Helpers\Helper;

class RequisitionsAuthor
{
    public static function createAuthor()
    {
        if(Helper::validadeInput($_POST)) {
            $modelAuthor = new ModelAuthor();

            if($modelAuthor->setAuthor($_POST['name'])) {

                $_SESSION['messege'] = 'Autor cadastrado com sucesso.';
                $_SESSION['type_messege'] = 'sucess';
            }
            else {

                $_SESSION['messege'] = 'Erro ao cadastrar Autor. Verifique se os dados foram preenchidos corretamente.';
                $_SESSION['type_messege'] = 'error';
            }
        }
        else {

            $_SESSION['messege'] = 'Verifique se todos os campos foram preenchidos corretamente.';
            $_SESSION['type_messege'] = 'error';
        }

        header('Location: /View/author/authors.php');
    }

    public static function updateAuthor()
    {
        if(Helper::validadeInput($_POST)){

            $modelAuthor = new ModelAuthor();

            if($modelAuthor->updateAuthor($_POST['update_id'], $_POST['name'], $_POST['cpf'])) {
                $_SESSION['messege'] = 'Dados atualizados com sucesso.';
                $_SESSION['type_messege'] = 'sucess';
            }
            else {

                $_SESSION['messege'] = 'Erro ao atualizar dados do Autor. Tente novamente.';
                $_SESSION['type_messege'] = 'error';
            }
        }
        else {

            $_SESSION['messege'] = 'Verifique se todos os campos foram preenchidos corretamente.';
            $_SESSION['type_messege'] = 'error';
        }
        header('Location: /View/author/authors.php');
    }

    public static function deleteAuthor()
    {
        if(Helper::validadeInput($_GET)) {

            $modelAuthor = new ModelAuthor();

            if($modelAuthor->deleteAuthor($_GET['delete_id'])) {
                $_SESSION['messege'] = 'Autor <strong>'.$_GET['name'].'</strong> excluido com sucesso.';
                $_SESSION['type_messege'] = 'sucess';
            }
            else {

                $_SESSION['messege'] = 'Erro ao excluir Autor <strong>'.$_GET['name'].'</strong>. Tente novamente.';
                $_SESSION['type_messege'] = 'error';
            }
        }
        else {

            $_SESSION['messege'] = 'Não foi possível excluir o Autor <strong>'.$_GET['name'].'</strong>, tente novamente.';
            $_SESSION['type_messege'] = 'error';
        }
        header('Location: /View/author/authors.php');
    }
}