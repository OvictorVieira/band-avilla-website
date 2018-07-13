<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 11/06/18
 * Time: 11:51
 */

require_once $_SERVER['DOCUMENT_ROOT'] . "/View/dashboardHeader.php";

use Library\Reports\ModelReportsReaders;
use Library\Helpers\Helper;

?>

    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="h2">Livros Mais Retirados</h4>
                <hr>
                <br>
                <div class="row">

                    <div class="col-12">
                        <table class="table" cellspacing="0">
                            <thead>
                            <tr>
                                <th class="w-50">Nome</th>
                                <th class="w-25">CPF</th>
                                <th class="text-right">Quantidade de Empréstimos</th>
                            </tr>
                            </thead>
                            <div class="table-responsive">
                                <tbody>
                                    <?php

                                        $modelReportsReaders = new ModelReportsReaders();

                                        $tableReaders = '';

                                        foreach ($modelReportsReaders->getReportReares() as $reportsReader) {
                                            $tableReaders .= '<tr>';
                                                $tableReaders .= '<td>'.$reportsReader['reader_name'].'</td>';
                                                $tableReaders .= '<td>' . Helper::Mask($reportsReader['reader_cpf']) . '</td>';
                                                $tableReaders .= '<td Class="text-center"><strong>' . $reportsReader['qtd_rdr_loan'] . '</strong></td>';

                                            $tableReaders .= '</tr>';
                                        }

                                        echo $tableReaders;
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