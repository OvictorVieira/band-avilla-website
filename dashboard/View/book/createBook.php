<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/View/dashboardHeader.php";

use Library\Model\Authors\ModelAuthor;
use Library\Model\Publishers\ModelPublisher;
use Library\Model\Genres\ModelGenre;
use Library\Messeges\Messeges;

?>

    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="h2">Cadastro de Livros</h4>
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
                                <form action="/App/Model/Books/ControlBooks.php" method="post" class="forms-sample">
                                    <input type="hidden" name="create" value="create">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="title" placeholder="Título" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control date" name="publication_date" placeholder="Data de Publicação" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="genre">Gênero</label>
                                        <select class="form-control" id="genre" name="genre">
                                            <?php

                                                $modelGenres = new ModelGenre();

                                                foreach ($modelGenres->getAllGenres() as $genre) {
                                                    echo '<option value="' . $genre->getId() . '">' . $genre->getGenreName() . '</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="author">Autor</label>
                                        <select class="form-control" id="author" name="author">
                                            <?php
                                                $modelAuthors = new ModelAuthor();

                                                foreach ($modelAuthors->getAllAuthors() as $author) {
                                                    echo '<option value="' . $author->getId() . '">' . $author->getFullName() . '</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="author">Editora</label>
                                        <select class="form-control" id="publisher" name="publisher">
                                            <?php
                                                $modelPublishers = new ModelPublisher();

                                                foreach ($modelPublishers->getAllPublisher() as $publisher) {
                                                    echo '<option value="' . $publisher->getId() . '">' . $publisher->getPublisherName() . '</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success mr-2">Cadastrar</button>
                                    <a href="books.php">
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