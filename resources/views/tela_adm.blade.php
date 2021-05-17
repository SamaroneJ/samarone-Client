@php
    $ok = 'Vazia';
    $us = json_encode($usuario);
    $usuario = json_decode($us);
    $uss = json_encode($usuarios);
    $usuarios = json_decode($uss);
    //dd($usuarios[0]->tipo);
    //echo $usuario->id;
    //echo $usuario->tipo;
    //echo $usuario->token;
    //dd($usuarios);
    if(!isset($usuario->tipo)){
        $ok = 'tem';
        $tipo = 99;
        $user = '';
    }else{
        $tipo = $usuario->tipo;
    }
    if (!isset($_SESSION)) session_start();
    
    if (isset($_SESSION['user']) && $_SESSION['logado'] == true) {
        //echo "logado";
        //echo $_SESSION['user'];
    }else{
        if($tipo != 99){
            $_SESSION['user'] = $usuario->user;
            $_SESSION['id'] = $usuario->id;
            $_SESSION['tipo'] = $usuario->tipo;
            $_SESSION['logado'] = true;
            $_SESSION['token'] = $usuario->token;
            
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
                    <h6>Bem vindo Administrador {{$usuario->user}}</h6> 
            @if($usuario->tipo == 99)
                <a href="{{ asset('/') }}" >Entrar</a>
            @else
                <a href="{{asset('/')}}api/logout/{{$_SESSION['id']}}" id="sair">Sair</a>
            @endif
            </div>
         </nav>
        <div id="Principal">
            <div class="card">

            </div>
            <div class="card">
                <h5 class="card-title text-center">Usuarios</h5>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Senha</th>
                        <th scope="col">Editar</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $item)
                            <tr>
                                <th scope="row">{{$item->idusuario}}</th>
                                @if( $item->tipo == 1)
                                    <td>Administrador</td>
                                @elseif($item->tipo == 2)
                                    <td>Prefeitura</td>
                                @else
                                    <td>Cidadão</td>
                                @endif
                                <td>{{$item->nome}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->senha}}</td>
                                <th scope="col"><a href="{{asset('/api/addUser')}}/{{$item->idusuario}}">Editar</a></th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>