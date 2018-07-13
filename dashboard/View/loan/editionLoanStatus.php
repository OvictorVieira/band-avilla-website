<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/View/dashboardHeader.php";

use Library\Model\Loans\ModelLoan;
use Library\Messeges\Messeges;

?>

    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="h2">Alterar Status do Empréstimo</h4>
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
                                <form action="/App/Model/Loans/ControlLoan.php" method="post" class="forms-sample">
                                    <input type="hidden" name="update_id" value="<?php echo $_GET['code'] ?>">
                                    <div class="form-group">
                                        <label for="title">Livros</label>
                                        <input type="text" class="form-control" name="bkTitle" value="<?php echo $_GET['bkTitle'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="genre">Leitor</label>
                                        <input type="text" class="form-control" name="readerName" value="<?php echo $_GET['readerName'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="return_date">Data de Devolução</label>
                                        <input type="text" class="form-control" name="loan_date" value="<?php echo date('d/m/Y', strtotime($_GET['loan_date'])) ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="genre">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <?php
                                                $modelLoanStatus = new ModelLoan();

                                                foreach ($modelLoanStatus->getStatus() as $key => $status) {

                                                    if($status['status'] == 'E') { // Status == 1
                                                        $typeStatus = 'Emprestado';
                                                    }

                                                    if($status['status'] == 'C'){ // Status == 2
                                                        $typeStatus = 'Cancelado';
                                                    }

                                                    if($status['status'] == 'D'){ // Status == 3
                                                        $typeStatus = 'Devolvido';
                                                    }

                                                    if($status['id'] != $_GET['status_id']) {
                                                        echo '<option value="' . $status['id'] . '">' . $typeStatus . '</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success mr-2">Salvar</button>
                                    <a href="loans.php">
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