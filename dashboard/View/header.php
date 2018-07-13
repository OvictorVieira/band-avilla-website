<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Acessar o Sistema</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="/Assets/images/logos/Library.png"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/Assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/Assets/css/others/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/Assets/css/others/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/Assets/css/others/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/Assets/css/others/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/Assets/css/others/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/Assets/css/others/util-login.css">
        <link rel="stylesheet" type="text/css" href="/Assets/css/others/main-login.css">
        <!--===============================================================================================-->
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light pos-fixed w-full navbar-custom">
            <a class="navbar-brand h5" href="../index.php">Biblioteca</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link h5" href="/index.php">Início<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h5" href="/View/login.php">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h5" href="/View/register.php">Registrar-se</a>
                    </li>
                </ul>
            </div>
        </nav>