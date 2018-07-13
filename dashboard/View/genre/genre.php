<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/View/dashboardHeader.php";

use Library\Model\Genres\ModelGenre;
use Library\Messeges\Messeges;

?>

    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="h2">Listagem de Gêneros</h4>
                <hr>
                <br>
                <div class="row">
                    <div class="col-12 mb-4">
                        <a href="createGenre.php">
                            <button type="button" class="btn btn-success">
                                <i class="fas fa-pencil-alt"></i>
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
                                    <th class="w-50">Gênero</th>
                                    <th class="text-center">Editar</th>
                                    <th class="text-center">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $modelGenre = new ModelGenre();

                                    $tableGenres = '';

                                    foreach($modelGenre->getAllGenres() as $genre) {
                                        $tableGenres .= '<tr>';
                                        $tableGenres .= '<input type="hidden" id="'. $genre->getId() .'">';
                                        $tableGenres .= '<td>'. $genre->getGenreName() .'</td>';
                                        $tableGenres .= '<td Class="text-center">
                                                                    <a href="editionGenre.php?code='. $genre->getId() .'&name='. $genre->getGenreName() .'">
                                                                        <button type="button" Class="btn btn-info"><i Class="mdi mdi-border-color"></i>Editar</button>
                                                                    </a>
                                                                </td>';
                                        $tableGenres .= '<td Class="text-center">
                                                                    <a href="/App/Model/Genres/ControlGenres.php?delete_id='. $genre->getId() .'&name='. $genre->getGenreName() .'">
                                                                        <button type="button" Class="btn btn-danger"><i Class="mdi mdi-delete"></i>Excluir</button>
                                                                    </a>
                                                                </td>';
                                        $tableGenres .= '</tr>';
                                    }

                                    echo $tableGenres;

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/View/dashboardFooter.php"; ?>