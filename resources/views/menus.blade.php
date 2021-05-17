@php
    $tipo = 1;
    $user = 1;
    
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
        <!--<nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{ asset('inicio') }}">Sistema de Prefeituras</a>
                @empty($dados)
                    @if ($tipo == 1)
                        <h6>Bem vindo Administrador {{$user}}</h6>
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
        <div id="login">-->
            <h3 class="text-center text-white pt-5">Primeira Tela</h3>
            
        </div>
    </body>
</html>