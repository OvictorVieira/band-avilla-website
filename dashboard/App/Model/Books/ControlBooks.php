<?php

use Library\Books\RequisitionsBook;

if(isset($_POST['create'])) {
    RequisitionsBook::createBook($_POST);
}

if(isset($_POST['update_id'])) {
    RequisitionsBook::updateBook($_POST);
}

if(isset($_GET['delete_id'])) {
    RequisitionsBook::deleteBook($_GET);
}