<?php

ini_set('display_errors','on');

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Library\Helpers\ValidateAcessRegister;

// É a tela de login?
if(isset($_POST['login'])) {
    ValidateAcessRegister::validateAcess();
}
// É a tela de Registro?
elseif (isset($_POST['register'])) {
    ValidateAcessRegister::validateRegister();
}
