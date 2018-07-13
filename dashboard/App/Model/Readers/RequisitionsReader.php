<?php

namespace Library\Model\Readers;

@session_start();

use Library\Helpers\Helper;

class RequisitionsReader
{
    public static function createReaders()
    {
        if(Helper::validadeInput($_POST)) {

            $modelReader = new ModelReader();

            if($modelReader->setReader($_POST['name'], $_POST['cpf'])) {
                $_SESSION['messege'] = 'leitor cadastrado com sucesso.';
                $_SESSION['type_messege'] = 'sucess';
            }
            else {
                $_SESSION['messege'] = 'Erro ao cadastrar leitor. Verifique se os dados foram preenchidos corretamente.';
                $_SESSION['type_messege'] = 'error';
            }
        }
        else {
            $_SESSION['messege'] = 'Erro ao cadastrar leitor. Verifique se os dados foram preenchidos corretamente.';
            $_SESSION['type_messege'] = 'error';
        }

        header('Location: /View/reader/readers.php');
    }

    // Edição de leitores
    public static function updateReaders()
    {
        if(Helper::validadeInput($_POST)) {

            $modelReader = new ModelReader();

            if($modelReader->updateReader($_POST['update_id'], $_POST['name'], $_POST['cpf'])) {
                $_SESSION['messege'] = 'Dados atualizados com sucesso.';
                $_SESSION['type_messege'] = 'sucess';
            }
            else {
                $_SESSION['messege'] = 'Erro ao atualizar dados do leitor. Verifique se os dados foram preenchidos corretamente.';
                $_SESSION['type_messege'] = 'error';
            }

            header('Location: /View/reader/readers.php');
        }
    }

    // Exclusão de leitores
    public static function deleteReaders()
    {
        if(Helper::validadeInput($_GET)) {

            $modelReader = new ModelReader();

            if($modelReader->deleteReader($_GET['delete_id'])) {
                $_SESSION['messege'] = 'leitor <strong>'.$_GET['name'].'</strong> excluido com sucesso.';
                $_SESSION['type_messege'] = 'sucess';
            }
            else {
                $_SESSION['messege'] = 'Erro ao excluir leitor <strong>'.$_GET['name'].'</strong>. Verifique se o mesmo não possui locações vinculadas a ele.';
                $_SESSION['type_messege'] = 'error';
            }
        }
        else {
            $_SESSION['messege'] = 'Erro ao excluir leitor <strong>'.$_GET['name'].'</strong>, tente novamente.';
            $_SESSION['type_messege'] = 'error';
        }

        header('Location: /View/reader/readers.php');

    }
}