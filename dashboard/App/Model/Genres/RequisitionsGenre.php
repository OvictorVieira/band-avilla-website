<?php

namespace Library\Model\Genres\ModelGenre;

@session_start();

use Library\Helpers\Helper;

class RequisitionsGenre
{
    // Criação de Gênero
    public static function createGenre()
    {
        if(Helper::validadeInput($_POST)) {

            $modelGenre = new ModelGenre();

            if($modelGenre->setGenre($_POST['name'])) {
                $_SESSION['messege'] = 'Gênero cadastrado com sucesso.';
                $_SESSION['type_messege'] = 'sucess';
            }
            else {
                $_SESSION['messege'] = 'Erro ao cadastrar Gênero. Verifique se os dados foram preenchidos corretamente.';
                $_SESSION['type_messege'] = 'error';
            }
        }
        else {
            $_SESSION['messege'] = 'Verifique se todos os campos foram preenchidos corretamente.';
            $_SESSION['type_messege'] = 'error';
        }

        header('Location: /View/genre/genre.php');
    }

    // Edição de Gênero
    public static function updateGenre()
    {
        if(Helper::validadeInput($_POST)) {

            $modelGenre = new ModelGenre();

            if($modelGenre->updateGenre($_POST['update_id'], $_POST['name'])) {
                $_SESSION['messege'] = 'Dados atualizados com sucesso.';
                $_SESSION['type_messege'] = 'sucess';
            }
            else {
                $_SESSION['messege'] = 'Erro ao atualizar dados do Gênero. Verifique se os dados foram preenchidos corretamente.';
                $_SESSION['type_messege'] = 'error';
            }
        }
        else {
            $_SESSION['messege'] = 'Verifique se todos os campos foram preenchidos corretamente.';
            $_SESSION['type_messege'] = 'error';
        }

        header('Location: /View/genre/genre.php');
    }

    // Exclusão de Gênero
    public static function deleteGenre()
    {
        if(Helper::validadeInput($_GET)) {

            $modelGenre = new ModelGenre();

            if($modelGenre->deleteGenre($_GET['delete_id'])) {
                $_SESSION['messege'] = 'Gênero <strong>'.$_GET['name'].'</strong> excluido com sucesso.';
                $_SESSION['type_messege'] = 'sucess';
            }
            else {
                $_SESSION['messege'] = 'Erro ao excluir Gênero <strong>'.$_GET['name'].'</strong>. Tente novamente.';
                $_SESSION['type_messege'] = 'error';
            }
        }
        else {
            $_SESSION['messege'] = 'Não foi possível excluir o Gênero <strong>'.$_GET['name'].'</strong>, tente novamente.';
            $_SESSION['type_messege'] = 'error';
        }

        header('Location: /View/genre/genre.php');
    }

}