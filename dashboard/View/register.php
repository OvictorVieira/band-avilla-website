<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/View/header.php"; ?>

        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55 m-t-150 m-b-150">

                    <?php
                        if(isset($_SESSION['messege'])) {
                            require_once $_SERVER['DOCUMENT_ROOT'] . '/View/Messeges/Messeges.php';
                            unset($_SESSION['messege']);
                        }
                    ?>

                    <form action="/App/Helpers/validate.php" method="post" class="login100-form validate-form flex-sb flex-w">
                        <input class="input100" type="hidden" name="register" value="register">
                        <span class="login100-form-title p-b-20">
                            Suas Informações
                        </span>

                        <span class="txt1 p-b-11">
                            Nome Completo
                        </span>
                        <div class="wrap-input100 validate-input m-b-36" data-validate = "É necessário informar o nome completo">
                            <input class="input100" type="text" name="full_name" id="full_name">
                            <span class="focus-input100"></span>
                        </div>

                        <span class="txt1 p-b-11">
                            CPF
                        </span>
                        <div class="wrap-input100 validate-input m-b-36" data-validate = "É necessário informar o seu CPF">
                            <input class="input100 cpf" type="text" name="cpf_number" id="cpf_number">
                            <span class="focus-input100"></span>
                        </div>

                        <span class="txt1 p-b-11">
                            Data de Nascimento
                        </span>
                        <div class="wrap-input100 validate-input m-b-36" data-validate = "É necessário informar a data de nascimento">
                            <input class="input100 date" type="text" name="birth_date" id="birth_date">
                            <span class="focus-input100"></span>
                        </div>

                        <span class="txt1 p-b-11">
                            E-mail
                        </span>
                        <div class="wrap-input100 validate-input m-b-36" data-validate = "É necessário informar um e-mail válido">
                            <input class="input100" type="email" name="email" id="email">
                            <span class="focus-input100"></span>
                        </div>

                        <span class="txt1 p-b-11">
                            Senha
                        </span>
                        <div class="wrap-input100 validate-input m-b-12" data-validate = "É necessário informar a senha">
                            <span class="btn-show-pass">
                                <i class="fa fa-eye"></i>
                            </span>
                            <input class="input100" type="password" name="password" id="password" >
                            <span class="focus-input100"></span>
                        </div>

                        <span class="txt1 p-b-11">
                            Digite sua senha novamente
                        </span>
                        <div class="wrap-input100 validate-input m-b-12" data-validate = "A senhas digitadas não são identicas">
                            <span class="btn-show-pass">
                                <i class="fa fa-eye"></i>
                            </span>
                            <input class="input100" type="password" name="repeated_password" id="repeated_password" >
                            <span class="focus-input100"></span>
                        </div>

                        <div class="flex-sb-m w-full p-b-48 justify-content-end">
                            <a href="login.php" class="txt3">
                                Já possui uma conta?
                            </a>
                        </div>

                        <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn">
                                Registrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/View/footer.php" ?>