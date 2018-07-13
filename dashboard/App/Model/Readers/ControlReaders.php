<?php

namespace Library\Model\Readers;

if(isset($_POST['create'])) {
    RequisitionsReader::createReaders();
}

if(isset($_POST['update_id'])) {
    RequisitionsReader::updateReaders();
}

if(isset($_GET['delete_id'])) {
    RequisitionsReader::deleteReaders();
}