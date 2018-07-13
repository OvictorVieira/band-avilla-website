<?php

use Library\Model\Publishers\RequisitionsPublisher;

if(isset($_POST['create'])) {
    RequisitionsPublisher::createPublisher();
}

if(isset($_POST['update_id'])) {
    RequisitionsPublisher::updatePublisher();
}

if(isset($_GET['delete_id'])) {
    RequisitionsPublisher::deletePublisher();
}