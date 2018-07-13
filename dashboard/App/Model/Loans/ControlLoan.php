<?php

use Library\Model\Loans\RequisitionsLoan;

if(isset($_POST['create'])) {
    RequisitionsLoan::createLoan();
}

if(isset($_POST['update_id'])) {

    RequisitionsLoan::updateStatusLoan();
}