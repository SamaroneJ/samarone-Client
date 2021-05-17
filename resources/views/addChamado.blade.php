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
                <form class="form-horizontal" action="{{asset('api/chamado')}}" method="POST">
                    <fieldset>
                        <div class="panel panel-primary offset-4">
                            <div class="panel-heading">Criar Chamado</div>
                                <div class="panel-body">
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-1 control-label" for="tipo">Tipo</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select id="tipo" name="tipo">
                                            <option value="1">Buraco</option>
                                            <option value="2">Ambiental</option>
                                            <option value="3">Limpeza</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-1 control-label" for="rua">Rua</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input id="rua" name="rua" placeholder="Digite a Rua" class="form-control input-md" required="" type="text">
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-1 control-label" for="bairro">Bairro</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input id="bairro" name="bairro" placeholder="Digite o bairro" class="form-control input-md" required="" type="text">
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-1 control-label" for="cidade">Cidade</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select id="cidade" name="cidade">
                                            <option value="2">Prefeitura</option>
                                            <option value="7">Ponta Grossa</option>
                                            <option value="8">Curitiba</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <input id="id" name="iduser" class="form-control input-md" type="hidden" value="{{$_SESSION['id']}}">
                                <input id="status" name="status" class="form-control input-md" type="hidden" value="1">
                                <!-- Button (Double) -->
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="Cadastrar"></label>
                                    <div class="col-md-8">
                                        <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Salvar</button>
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