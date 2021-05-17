@php
    $ok = 'Vazia';
    $us = json_encode($usuario);
    $usuario = json_decode($us);
    $ch = json_encode($chamados);
    $chamado = json_decode($ch);

    if(isset($chamado->ERRO)){
        $chamado = 0;
    }
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
                <h5 class="card-title text-center">Seus Chamados</h5>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Status</th>
                        <th scope="col">Rua</th>
                        <th scope="col">Bairro</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Resposta</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                        @if($chamado<>0)
                            @foreach ($chamado as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                @if( $item->tipo == 1)
                                    <td>Buraco</td>
                                @elseif($item->tipo == 2)
                                    <td>Ambiental</td>
                                @else
                                    <td>Limpeza</td>
                                @endif
                                <td>{{$item->status}}</td>
                                <td>{{$item->rua}}</td>
                                <td>{{$item->bairro}}</td>
                                <td>{{$item->cidade}}</td>
                                <td>{{$item->observacao}}</td>
                                
                                @if($usuario->tipo == 2)
                                    <th scope="col"><a href="{{asset('/api/chamado')}}/{{$item->id}}">Responder</a></th>
                                @endif
                            </tr>
                            @endforeach    
                        @endif
                    </tbody>
                </table>
                @if($usuario->tipo == 3)
                    <div class="col-md-12">
                        <a href="{{asset('/addChamado')}}"><button id="Novo" name="Novo" class="offset-md-3 btn btn-success col-5">Novo Chamado</button></a>
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>