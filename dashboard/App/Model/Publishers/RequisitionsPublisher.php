<?php

namespace Library\Model\Publishers;

@session_start();

use Library\Helpers\Helper;

class RequisitionsPublisher
{
    // Criação de Editora
    public static function createPublisher()
    {
        if (Helper::validadeInput($_POST)) {

            $modelPublisher = new ModelPublisher();

            if($modelPublisher->setPublisher($_POST['name'])) {
                $_SESSION['messege'] = 'Editora cadastrado com sucesso.';
                $_SESSION['type_messege'] = 'sucess';
            }
            else {
                $_SESSION['messege'] = 'Erro ao cadastrar Editora. Verifique se os dados foram preenchidos corretamente.';
                $_SESSION['type_messege'] = 'error';
            }
        }
        else {
            $_SESSION['messege'] = 'Erro, verifique se todos os dados foram preenchidos.';
            $_SESSION['type_messege'] = 'error';
        }

        header('Location: /View/Publisher/publishers.php');
    }

    // Edição de Editora
    public static function updatePublisher()
    {
        if (Helper::validadeInput($_POST)) {

            $modelPublisher = new ModelPublisher();

            if($modelPublisher->updatePublisher($_POST['update_id'], $_POST['name'])) {
                $_SESSION['messege'] = 'Dados atualizados com sucesso.';
                $_SESSION['type_messege'] = 'sucess';
            }
            else {
                $_SESSION['messege'] = 'Erro ao atualizar dados da Editora. Verifique se os dados foram preenchidos corretamente.';
                $_SESSION['type_messege'] = 'error';
            }
        }
        else {
            $_SESSION['messege'] = 'Erro, verifique se todos os dados foram preenchidos.';
            $_SESSION['type_messege'] = 'error';
        }

        header('Location: /View/Publisher/publishers.php');
    }

    // Exclusão de Editora
    public static function deletePublisher()
    {
        if (Helper::validadeInput($_GET)) {

            $modelPublisher = new ModelPublisher();

            if($modelPublisher->deletePublisher($_GET['delete_id'])) {
                $_SESSION['messege'] = 'Editora <strong>'.$_GET['name'].'</strong> excluido com sucesso.';
                $_SESSION['type_messege'] = 'sucess';
            }
            else {
                $_SESSION['messege'] = 'Erro ao excluir Editora <strong>'.$_GET['name'].'</strong>. Tente novamente.';
                $_SESSION['type_messege'] = 'error';
            }
        }
        else {
            $_SESSION['messege'] = 'Erro, verifique se todos os dados foram preenchidos.';
            $_SESSION['type_messege'] = 'error';
        }

        header('Location: /View/Publisher/publishers.php');
    }
}