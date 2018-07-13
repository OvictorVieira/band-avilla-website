<?php

use Library\Model\Genres\ModelGenre\RequisitionsGenre;

if(isset($_POST['create'])) {
    RequisitionsGenre::createGenre($_POST);
}

if(isset($_POST['update_id'])) {
    RequisitionsGenre::updateGenre($_POST);
}

if(isset($_GET['delete_id'])) {
    RequisitionsGenre::deleteGenre($_GET);
}