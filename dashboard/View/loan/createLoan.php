<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/View/dashboardHeader.php";

use Library\Model\Books\ModelBook;
use Library\Model\Readers\ModelReader;
use Library\Messeges\Messeges;

?>

    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="h2">Realizar Empréstimo</h4>
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
                                    <input type="hidden" name="create" value="create">
                                    <div class="form-group">
                                        <label for="title">Livros</label>
                                        <select class="form-control" id="id_book" name="id_book">
                                            <?php

                                                $modelBook = new ModelBook();

                                                foreach ($modelBook->getAllBook() as $book) {
                                                    echo '<option value="' . $book->getId() . '">' . $book->getTitle() . '</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="genre">Leitor</label>
                                        <select class="form-control" id="reader" name="reader">
                                            <?php

                                                $modelReader = new ModelReader();

                                                foreach ($modelReader->getAllReader() as $reader) {
                                                    echo '<option value="' . $reader->getId() . '">' . $reader->getFullName() . '</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="return_date">Data de Devolução</label>
                                        <input type="date" class="form-control" name="return_date" required>
                                    </div>
                                    <button type="submit" class="btn btn-success mr-2">Cadastrar</button>
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