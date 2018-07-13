<?php

namespace Library\Books;

@session_start();

use Library\Helpers\Helper;

class RequisitionsBook
{
    // Criação de Livro
    public static function createBook()
    {
        if(Helper::validadeInput($_POST)) {

            $modelBook = new ModelBook();

            if($modelBook->setBook($_POST['title'],$_POST['publication_date'],$_POST['genre'],$_POST['author'],$_POST['publisher'])) {
                $_SESSION['messege'] = 'Livro cadastrado com sucesso.';
                $_SESSION['type_messege'] = 'sucess';
            }
            else {
                $_SESSION['messege'] = 'Erro ao cadastrar Livro. Verifique se os dados foram preenchidos corretamente.';
                $_SESSION['type_messege'] = 'error';
            }
        }
        else {
            $_SESSION['messege'] = 'Verifique se os dados foram preenchidos corretamente.';
            $_SESSION['type_messege'] = 'error';
        }

        header('Location: /View/book/books.php');
    }

    // Edição de Livro
    public static function updateBook()
    {
        if(Helper::validadeInput($_POST)) {

            $modelBook = new ModelBook();

            if($modelBook->updateBook($_POST['update_id'], $_POST['title'], $_POST['publication_date'], $_POST['genre'], $_POST['author'], $_POST['publisher'])) {
                $_SESSION['messege'] = 'Dados atualizados com sucesso.';
                $_SESSION['type_messege'] = 'sucess';
            }
            else {
                $_SESSION['messege'] = 'Erro ao atualizar dados da Livro. Verifique se os dados foram preenchidos corretamente.';
                $_SESSION['type_messege'] = 'error';
            }
        }
        else {
            $_SESSION['messege'] = 'Verifique se os dados foram preenchidos corretamente.';
            $_SESSION['type_messege'] = 'error';
        }

        header('Location: /View/book/books.php');
    }

    // Exclusão de Livro
    public static function deleteBook()
    {
        if(Helper::validadeInput($_GET)) {

            $modelBook = new ModelBook();

            if($modelBook->deleteBook($_GET['delete_id'])) {
                $_SESSION['messege'] = 'Livro <strong>'.$_GET['bookTitle'].'</strong> excluido com sucesso.';
                $_SESSION['type_messege'] = 'sucess';
            }
            else {
                $_SESSION['messege'] = 'Erro ao excluir Livro <strong>'.$_GET['bookTitle'].'</strong>. Verifique se o mesmo está vinculado a algum empréstimo.';
                $_SESSION['type_messege'] = 'error';
            }
        }

        header('Location: /View/book/books.php');
    }
}