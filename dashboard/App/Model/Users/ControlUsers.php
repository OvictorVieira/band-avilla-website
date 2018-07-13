<?php

use Library\Model\Users\RequisitionsUsers;

if(isset($_POST['create'])) {
    RequisitionsUsers::createUsers();
}

if(isset($_POST['update_id'])) {
    RequisitionsUsers::updateUsers();
}

if(isset($_GET['delete_id'])) {
    RequisitionsUsers::deleteUsers();
}