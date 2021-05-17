@php
    if (!isset($_SESSION)) session_start();
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
                    <h6>Bem vindo Administrador {{$_SESSION['user']}}</h6> 
            <a href="{{asset('/')}}api/logout/{{$_SESSION['id']}}" id="sair">Sair</a>
            </div>
         </nav>
        <div id="Principal">
            <div class="card">
                <form class="form-horizontal" action="{{asset('api/chamado')}}/{{$dados[0]->id}}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <fieldset>
                        <div class="panel panel-primary offset-4">
                            <div class="panel-heading">Chamado nº {{$dados[0]->id}}</div>
                                <div class="panel-body">
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-1 control-label" for="tipo">Tipo</label>
                                    </div>
                                    <div class="col-md-8">
                                        @if ($dados[0]->tipo == 1)
                                            <h4>Buraco</h4>
                                        @elseif($dados[0]->tipo == 2)
                                            <h4>Ambiental</h4>
                                        @elseif($dados[0]->tipo == 3)
                                            <h4>Limpeza</h4>
                                        @endif
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-1 control-label" for="rua">Rua</label>
                                    </div>
                                    <div class="col-md-8">
                                        <h4>{{$dados[0]->rua}}</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-1 control-label" for="bairro">Bairro</label>
                                    </div>
                                    <div class="col-md-8">
                                        <h4>{{$dados[0]->bairro}}</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-1 control-label" for="observação">Observação</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea id="observacao" name="observacao"></textarea>
                                    </div>
                                </div>
                                <!-- Button (Double) -->
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="Cadastrar"></label>
                                    <div class="col-md-8">
                                        <button class="btn btn-success" type="Submit">Salvar</button>
                                        <!--<button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </body>
</html>