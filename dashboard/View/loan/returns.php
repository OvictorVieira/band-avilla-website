<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/View/dashboardHeader.php";

use Library\Model\Loans\ModelLoan;

?>

    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="h2">Devoluções</h4>
                <hr>
                <br>
                <div class="row">
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
                                    <th class="text-left">Data de Entrega</th>
                                </tr>
                            </thead>
                            <div class="table-responsive">
                                <tbody>
                                    <?php

                                        $modelReturns = new ModelLoan();

                                        $tableLoans = '';

                                        foreach ($modelReturns->getAllLoans() as $loan) {

                                            // 3 == Devolvido
                                            if($loan->getStatusId() == '3') {

                                                $tableLoans .= '<tr>';
                                                $tableLoans .= '<input type="hidden" id="'. $loan->getLoanId() .'">';
                                                $tableLoans .= '<td>'. $loan->getBookTitle() .'</td>';

                                                $loanDateFormat = date('d/m/Y', strtotime( $loan->getLoanDate() ));

                                                $tableLoans .= '<td>' . $loanDateFormat . '</td>';

                                                $returnDateFormat = date('d/m/Y', strtotime( $loan->getReturnDate() ));

                                                $tableLoans .= '<td>' . $returnDateFormat . '</td>';

                                                if($loan->getStatusId() == 3){
                                                    $status = '<label Class="badge badge-success">Devolvido</label>';
                                                }

                                                $tableLoans .= '<td>'. $status .'</td>';
                                                $tableLoans .= '<td>'. $loan->getUserName() .'</td>';
                                                $tableLoans .= '<td>'. $loan->getReaderName() .'</td>';

                                                $dateReturnedFormat = date('d/m/Y', strtotime( $loan->getDateReturned() ));
                                                $dateReturned = '<td Class="text-danger">'.$dateReturnedFormat.'</td>';

                                                $tableLoans .= $dateReturned;
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