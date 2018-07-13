<?php

namespace Library\Model\Loans;

@session_start();

use Library\Helpers\Helper;

class RequisitionsLoan
{
    // Criação de Emprestimos
    /**
     * @param $_POST
     */
    public static function createLoan()
    {
        if((Helper::validadeInput($_POST)) && $_POST['return_date'] >= date('Y-m-d')) {

            $modelLoan = new ModelLoan();

            if($modelLoan->setLoan($_POST['id_book'], $_POST['reader'], $_SESSION['email'], $_POST['return_date'])) {
                $_SESSION['messege'] = 'Empréstimo cadastrado com sucesso.';
                $_SESSION['type_messege'] = 'sucess';
            }
            else {
                $_SESSION['messege'] = 'Erro ao cadastrar Empréstimo. Dados inválidos.';
                $_SESSION['type_messege'] = 'error';
            }
        }
        else {
            $_SESSION['messege'] = 'Verifique se todos os dados foram inseridos corretamente ou se a data de devolução é inferior a data atual.';
            $_SESSION['type_messege'] = 'error';
        }

        header('Location: /View/loan/loans.php');
    }

    // Edição de Status dos Emprestimos
    public static function updateStatusLoan()
    {
        if(Helper::validadeInput($_POST)) {

            $modelLoan = new ModelLoan();

            if($modelLoan->updateLoan($_POST['update_id'], $_POST['status'])) {
                $_SESSION['messege'] = 'Status atualizados com sucesso.';
                $_SESSION['type_messege'] = 'sucess';
            }
            else {
                $_SESSION['messege'] = 'Erro ao atualizar o status. Tente novamente.';
                $_SESSION['type_messege'] = 'error';
            }
        }
        else {
            $_SESSION['messege'] = 'Erro ao atualizar o status. Verifique se os campos estão corretos.';
            $_SESSION['type_messege'] = 'error';
        }

        header('Location: /View/loan/loans.php');
    }
}