<?php

use Library\Model\Authors\RequisitionsAuthor;

if(isset($_POST['create'])) {
    RequisitionsAuthor::createAuthor();
}

if(isset($_POST['update_id'])) {
    RequisitionsAuthor::updateAuthor();
}

if(isset($_GET['delete_id'])) {
    RequisitionsAuthor::deleteAuthor();
}