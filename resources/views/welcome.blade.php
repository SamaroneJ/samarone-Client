@php
    if (!isset($_SESSION)) session_start();
    if (isset($_SESSION['user']['logado']) && $_SESSION['user']['logado'] == true) {
        echo "logado";
    }else{
        echo "não logado";
    }
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cliente - Samarone</title>
        <link rel="stylesheet" type="text/css" href="/css/my.css" />
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"/>
        
    </head>
    <body class="body-login">
        <div id="login">
            <h3 class="text-center text-white pt-5">Sistema de Solicitações</h3>
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form" class="form" action='' method="GET">
                                <h3 class="text-center text-info">Login</h3>
                                <div class="form-group">
                                    <label for="username" class="text-info">Usuario:</label><br>
                                    <input type="text" name="username" id="username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="text-info">Senha:</label><br>
                                    <input type="text" name="password" id="password" class="form-control">
                                </div>
                                <div class="form-group m-4 text-center">
                                    <input onClick="enviar();" id="enviar" name="enviar" class="btn btn-info btn-md" value="Entrar">
                                </div>
                                <div id="register-link" class="text-right">
                                    <a href="#" class="text-info">Cadastrar-se</a>
                                </div>
                                <!-- <div class="text-right">
                                    <a href="#" class="text-info">Cadastrar-se</a>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
    document.getElementById("enviar").onclick = function (){
        $user = document.getElementById('username').value;
        $password = document.getElementById('password').value;
        $rota = "{{asset('api/login')}}"+'/'+ $user + '&' + $password;
        window.location=$rota;
    }
    </script>
</html>
