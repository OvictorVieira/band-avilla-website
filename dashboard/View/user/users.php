<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/View/dashboardHeader.php";

use Library\Helpers\Helper;
use Library\Model\Users\ModelUser;
use Library\Messeges\Messeges;

?>

    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="h2">Listagem de Usuários</h4>
                <hr>
                <br>
                <div class="row">
                    <div class="col-12 mb-4">
                        <a href="createUser.php">
                            <button type="button" class="btn btn-success">
                                <i class="fas fa-user-alt"></i>
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
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Data de Nascimento</th>
                                    <th>E-mail</th>
                                    <th class="text-center">Editar</th>
                                    <th class="text-center">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    $modelUser = new ModelUser();

                                    $tableUsers = '';

                                    foreach ($modelUser->getAllUser() as $user) {
                                        $tableUsers .= '<tr>';
                                        $tableUsers .= '<input type="hidden" id="'. $user->getId() .'">';
                                        $tableUsers .= '<td>'. $user->getFullName() .'</td>';
                                        $tableUsers .= '<td>'. Helper::Mask($user->getCpf()) .'</td>';
                                        $tableUsers .= '<td>'. ($birthDate = Helper::dateFormat($user->getBirthDate(), 'Y-m-d', 'd/m/Y')) .'</td>';
                                        $tableUsers .= '<td>'. $user->getEmail() .'</td>';
                                        $tableUsers .= '<td Class="text-center">
                                                            <a href="editionUser.php?code='. $user->getId() .'&name='. $user->getFullName() .'&cpf='. $user->getCpf() .'&birthDate='. $birthDate .'&email='. $user->getEmail() .'">
                                                                <button type="button" Class="btn btn-info"><i Class="mdi mdi-border-color"></i>Editar</button>
                                                            </a>
                                                        </td>';
                                        $tableUsers .= '<td Class="text-center">
                                                            <a href="/App/Model/Users/ControlUsers.php?delete_id='. $user->getId() .'&name='. $user->getFullName() .'">
                                                                <button type="button" Class="btn btn-danger"><i Class="mdi mdi-delete"></i>Excluir</button>
                                                            </a>
                                                        </td>';
                                    }

                                    echo $tableUsers;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/View/dashboardFooter.php"; ?>