<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/View/dashboardHeader.php";

use Library\Model\Readers\ModelReader;
use Library\Helpers\Helper;
use Library\Messeges\Messeges;

?>

    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="h2">Listagem de Leitores</h4>
                <hr>
                <br>
                <div class="row">
                    <div class="col-12 mb-4">
                        <a href="createReader.php">
                            <button type="button" class="btn btn-success">
                                <i class="fas fa-user-graduate"></i>
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
                        <table id="order-listing" class="table" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="w-50">Nome</th>
                                    <th class="w-25">CPF</th>
                                    <th class="text-center">Editar</th>
                                    <th class="text-center">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    $modelReader = new ModelReader();

                                    $tableReaders = '';

                                    foreach ($modelReader->getAllReader() as $reader) {
                                        $tableReaders .= '<tr>';
                                        $tableReaders .= '<input type="hidden" id="' . $reader->getId() . '">';
                                        $tableReaders .= '<td>' . $reader->getFullName() . '</td>';
                                        $tableReaders .= '<td>' . Helper::Mask($reader->getCpf()) . '</td>';
                                        $tableReaders .= '<td Class="text-center">
                                                            <a href="editionReader.php?code=' . $reader->getId()  . '&name=' . $reader->getFullName() . '&cpf=' . $reader->getCpf() . '">
                                                                <button type="button" Class="btn btn-info"><i Class="mdi mdi-border-color"></i>Editar</button>
                                                            </a>
                                                          </td>';
                                        $tableReaders .= '<td Class="text-center">
                                                            <a href="/App/Model/Readers/ControlReaders.php?delete_id=' . $reader->getId()  . '&name=' . $reader->getFullName() . '">
                                                                <button type="button" Class="btn btn-danger"><i Class="mdi mdi-delete"></i>Excluir</button>
                                                            </a>
                                                          </td>';
                                        $tableReaders .= '</tr>';
                                    }

                                    echo $tableReaders;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/View/dashboardFooter.php"; ?>