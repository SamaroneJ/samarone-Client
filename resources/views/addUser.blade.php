<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cliente - Samarone</title>
        <link rel="stylesheet" type="text/css" href="/css/my.css" />
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"/>
    </head>
    <body class="body-login">
        <div class="Principal  offset-md-2">

            <form class="form-horizontal" action="{{asset('api/addUser')}}" method="POST">
                <fieldset>
                    <div class="panel panel-primary">
                        <div class="panel-heading">Alterar Usuarios</div>
                            
                            <div class="panel-body">
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-1 control-label" for="Nome">Nome</label>
                                </div>
                                <div class="col-md-8">
                                    <input id="Nome" name="Nome" placeholder="Digite seu nome" class="form-control input-md" required="" type="text">
                                </div>
                            </div>
        
                            <!-- Prepended text-->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="email">Email</label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input id="email" name="email" class="form-control" placeholder="email@email.com" required="" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                                    </div>
                                </div>
                            </div>

                            <label class="col-md-1 control-label" for="Nome">Senha</label>  
                            <div class="col-md-2">
                                <input id="senha" name="senha" placeholder="Digite sua senha" class="form-control input-md" required="" type="password" maxlength="10" onBlur="showhide()">
                            </div>
                            
                            <input id="tipo" name="tipo" class="form-control input-md" type="hidden" value="3">
                            <!-- Button (Double) -->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="Cadastrar"></label>
                                <div class="col-md-8">
                                    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Alterar</button>
                                    <!--<button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </body>
</html>