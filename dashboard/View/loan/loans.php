<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/View/dashboardHeader.php";

use Library\Model\Loans\ModelLoan;
use Library\Messeges\Messeges;

?>

    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="h2">Emprestimos</h4>
                <hr>
                <br>
                <div class="row">
                    <div class="col-12 mb-4">
                        <a href="createLoan.php">
                            <button type="button" class="btn btn-success">
                                <i class="fas fa-book"></i>
                                Cadastrar
                            </button>
                        </a>
                        <?php
                            if(isset($_SESSION['messege'])) {
                                Messeges::getMessege();
                                unset($_SESSION['messege']);
                            }
                        ?>
                    </div>

                    <div class="col-12">
                        <table class="table" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-left">Título</th>
                                    <th class="text-left">Data do Empréstimo</th>
                                    <th class="text-left">Data de Devolução</th>
                                    <th class="text-left">Status</th>
                                    <th class="text-left">Usuário/Funcionário</th>
                                    <th class="text-left">Leitor</th>
                                    <th class="text-left">Data de Cancelamento</th>
                                    <th class="text-left">Data de Entrega</th>
                                    <th class="text-center">Alterar Status</th>
                                </tr>
                            </thead>
                            <div class="table-responsive">
                                <tbody>
                                    <?php

                                        $modelLoan = new ModelLoan();

                                        $tableLoans = '';

                                        foreach ($modelLoan->getAllLoans() as $loan) {
                                            if($loan->getStatusId() == 1) {

                                                $tableLoans .= '<tr>';
                                                $tableLoans .= '<input type="hidden" id="' . $loan->getId() . '">';
                                                $tableLoans .= '<td>' . $loan->getBookTitle() . '</td>';

                                                $loanDateFormat = date('d/m/Y', strtotime( $loan->getLoanDate() ));

                                                $tableLoans .= '<td>' . $loanDateFormat . '</td>';

                                                $returnDateFormat = date('d/m/Y', strtotime( $loan->getReturnDate() ));

                                                $tableLoans .= '<td>' . $returnDateFormat . '</td>';

                                                if ($loan->getStatusId() == 1) {
                                                    $status = '<label Class="badge badge-info">Emprestado</label>';
                                                }

                                                $tableLoans .= '<td>' . $status . '</td>';
                                                $tableLoans .= '<td>' . $loan->getUserName() . '</td>';
                                                $tableLoans .= '<td>' . $loan->getReaderName() . '</td>';

                                                if ($loan->getCancellationDate() == null || $loan->getCancellationDate() == '') {
                                                    $cancellationDate = '<td Class="text-muted">Não Cancelado</td>';
                                                }

                                                if ($loan->getDateReturned() == null || $loan->getDateReturned() == '') {
                                                    $dateReturned = '<td Class="text-danger">Pendente</td>';
                                                }

                                                $tableLoans .= $cancellationDate;
                                                $tableLoans .= $dateReturned;

                                                $tableLoans .= '<td Class="text-center">
                                                                    <a href="editionLoanStatus.php?code=' . $loan->getId() . '&bkTitle=' . $loan->getBookTitle() . '&loan_date=' . $loan->getLoanDate() . '&readerName=' . $loan->getReaderName() . '&status_id=' . $loan->getStatusId() . '">
                                                                        <button type="button" Class="btn btn-info"><i Class="mdi mdi-border-color"></i>Editar</button>
                                                                    </a>
                                                                </td>';

                                                $tableLoans .= '</tr>';
                                            }
                                        }

                                        echo $tableLoans;

                                    ?>
                                </tbody>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/View/dashboardFooter.php"; ?>