<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/View/dashboardHeader.php";

use Library\Messeges\Messeges;

?>

    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="h2">Cadastro de Usuários</h4>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <?php
                            if(isset($_SESSION['messege'])) {
                                Messeges::getMessege();
                                unset($_SESSION['messege']);
                            }
                        ?>
                    </div>

                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form action="/App/Model/Users/ControlUsers.php" method="post" class="forms-sample">
                                    <input type="hidden" name="create" value="create">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="full_name" placeholder="Nome">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control cpf" name="cpf_number" placeholder="CPF">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control date" name="birth_date" placeholder="Data de Nascimento">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="E-mail">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Senha">
                                    </div>
                                    <button type="submit" class="btn btn-success mr-2">Cadastrar</button>
                                    <a href="users.php">
                                        <button type="button" class="btn btn-light">Cancelar</button>
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/View/dashboardFooter.php"; ?>