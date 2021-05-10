@php
    $ok = 'Vazia';
    if(!isset($tipo)){
        $ok = 'tem';
        $tipo = 99;
        $user = '';
    }

    if (!isset($_SESSION)) session_start();
    
    if (isset($_SESSION['user']) && $_SESSION['logado'] == true) {
        echo "logado";
        echo $_SESSION['user'];
    }else{
        echo "LOGOU";
        if($tipo != 99){
            $_SESSION['user'] = $user;
            $_SESSION['id'] = $id;
            $_SESSION['tipo'] = $tipo;
            $_SESSION['logado'] = true;
            $_SESSION['token'] = $token;
        }
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
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{ asset('inicio') }}">Sistema de Prefeituras</a>
                @empty($dados)
                    @if ($tipo == 1)
                        <h6>Bem vindo Adiministrador {{$user}}</h6>
                    @elseif($tipo == 2)
                        <h6>Bem vindo Prefeitura {{$user}}</h6>
                    @elseif($tipo == 3)
                        <h6>Bem vindo Cidadão {{$user}}</h6>
                    @endif
                @endempty
            @if($tipo == 99)
                <a href="{{ asset('/') }}" >Entrar</a>
            @else
                <a href="{{asset('/')}}api/logout/{{$_SESSION['id']}}" id="sair">Sair</a>
            @endif
            </div>
          </nav>
        <div id="login">
            <h3 class="text-center text-white pt-5">Primeira Tela</h3>
        </div>
    </body>
</html>
<script>
    /*document.getElementById("sair").onclick = function (){
        @php
            session_destroy();
        @endphp
        alert('Sair');
    }*/
</script>