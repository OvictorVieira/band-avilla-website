<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/View/dashboardHeader.php";

use Library\Model\Books\ModelBook;
use Library\Helpers\Helper;
use Library\Messeges\Messeges;

?>

    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="h2">Livros Cadastrados</h4>
                <hr>
                <br>
                <div class="row">
                    <div class="col-12 mb-4">
                        <a href="createBook.php">
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
                                    <th class="w-25">Título</th>
                                    <th class="text-left">Gênero</th>
                                    <th class="text-left">Autor</th>
                                    <th class="text-left">Editora</th>
                                    <th class="text-left">Data de Publicação</th>
                                    <th class="text-center">Editar</th>
                                    <th class="text-center">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    $modelBook = new ModelBook();

                                    $tableBook = '';

                                    foreach($modelBook->getAllBook() as $book) {

                                        $tableBook .= '<tr>';
                                        $tableBook .= '<input type="hidden" id="'. $book->getId() .'">';
                                        $tableBook .= '<td>'. $book->getTitle() .'</td>';
                                        $tableBook .= '<td>'. $book->getGenreName() .'</td>';
                                        $tableBook .= '<td>'. $book->getAuthorName() .'</td>';
                                        $tableBook .= '<td>'. $book->getPublisherName() .'</td>';
                                        $tableBook .= '<td>'.($publicationDate = Helper::dateFormat($book->getPublicationDate(), 'Y-m-d' , 'd/m/Y')).'</td>';
                                        $tableBook .= '<td Class="text-center">
                                                                    <a href="editionBook.php?code='. $book->getId() .'&name='. $book->getTitle() .'&genreId='. $book->getGenreId() .'&authorId='. $book->getAuthorId() .'&publisherId='. $book->getPublisherId() .'&publicationDate='. $book->getPublicationDate() .'">
                                                                        <button type="button" Class="btn btn-info"><i Class="mdi mdi-border-color"></i>Editar</button>
                                                                    </a>
                                                                </td>';
                                        $tableBook .= '<td Class="text-center">
                                                                    <a href="/app/Model/Books/ControlBooks.php?delete_id='. $book->getId() .'&name='. $book->getTitle() .'">
                                                                        <button type="button" Class="btn btn-danger"><i Class="mdi mdi-delete"></i>Excluir</button>
                                                                    </a>
                                                                </td>';
                                        $tableBook .= '</tr>';
                                    }

                                    echo $tableBook;

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/View/dashboardFooter.php"; ?>