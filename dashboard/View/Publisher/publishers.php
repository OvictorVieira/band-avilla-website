<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/View/dashboardHeader.php";

use Library\Model\Publishers\ModelPublisher;
use Library\Messeges\Messeges;

?>
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="h2">Listagem de Editoras</h4>
                <hr>
                <br>
                <div class="row">
                    <div class="col-12 mb-4">
                        <a href="createPublisher.php">
                            <button type="button" class="btn btn-success">
                                <i class="fas fa-address-book"></i>
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
                                    <th class="w-50">Nome</th>
                                    <th class="text-center">Editar</th>
                                    <th class="text-center">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $modelPublisher = new ModelPublisher();

                                    $tablePublisher = '';

                                    foreach($modelPublisher->getAllPublisher() as $publisher) {
                                        $tablePublisher .= '<tr>';
                                        $tablePublisher .= '<input type="hidden" id="'. $publisher->getId() .'">';
                                        $tablePublisher .= '<td>'. $publisher->getPublisherName() .'</td>';
                                        $tablePublisher .= '<td Class="text-center">
                                                                <a href="editionPublisher.php?code='. $publisher->getId() .'&name='. $publisher->getPublisherName() .'">
                                                                    <button type="button" Class="btn btn-info"><i Class="mdi mdi-border-color"></i>Editar</button>
                                                                </a>
                                                            </td>';
                                        $tablePublisher .= '<td Class="text-center">
                                                                <a href="/App/Model/Publishers/ControlPublisher.php?delete_id='. $publisher->getId() .'&name='. $publisher->getPublisherName() .'">
                                                                    <button type="button" Class="btn btn-danger"><i Class="mdi mdi-delete"></i>Excluir</button>
                                                                </a>
                                                            </td>';
                                        $tablePublisher .= '</tr>';
                                    }

                                    echo $tablePublisher;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/View/dashboardFooter.php"; ?>