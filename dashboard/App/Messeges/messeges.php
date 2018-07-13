<?php

namespace Library\Messeges;

@session_start();

class Messeges
{
    public static function getMessege()
    {
        if($_SESSION['type_messege'] == 'sucess') {
            $messegeHtml = '<div class="alert alert-success my-3" role="alert">' . $_SESSION['messege'] . '</div>';
        }
        else {
            $messegeHtml = '<div class="alert alert-danger my-3" role="alert">' . $_SESSION['messege'] . '</div>';
        }

        echo $messegeHtml;
    }
}