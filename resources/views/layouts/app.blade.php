<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TROCA VIEWS</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Scripts geral-->
    <script type="text/javascript" src="{{ asset('js/home/verificaVideo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/home/funcaoVideo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/home/home.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- Scripts Sidebar -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    {{-- Chama os Componentes --}}
    @stack('components') 

    <!-- Fonts (SIDEBAR)-->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" id="bootstrap-css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles sidebar-->
    <link href="{{ asset('css/home/home.css') }}" rel="stylesheet">
    
</head>
<style type="text/css">
html,
body {
  height: 100%;
}

#page-content {
  flex: 1 0 auto;
}

</style>
<body class="d-flex flex-column">
    <div class="wrapper" id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/troca') }}">
                    TROCA VIEWS
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
    @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Logar') }}</a>
                            </li>
        @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
        @endif
    @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
    @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <main class="py-4">
    @if(Auth::user())
            <div style="display: none;" id="userId">{{ $user->id }}</div>  
            <div class="container">
                <div class="row profile">
                    <div class="col-md-3">
                        <div class="profile-sidebar shadow-sm">
                            <!-- SIDEBAR USERPIC -->
                            <div class="profile-userpic">
                                @if ($user)
                                    <img src="{{ $user->name }}" class="img-responsive" alt="">    
                                @else
                                    <i class="fa fa-user" aria-hidden="true"></i>  
                                @endif
                            </div>

                            <!-- END SIDEBAR USERPIC -->
                            <!-- SIDEBAR USER TITLE -->
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name" style="">
                                    {{ strtoupper(Auth::user()->name) }}
                                </div>
                                <div class="profile-usertitle-job">
                                    <i class="fa fa-youtube-play profile-usermenu" aria-hidden="true"></i> youtuber
                                </div>
                            </div>
                            <hr>
                            <!-- END SIDEBAR USER TITLE -->
                            <!-- SIDEBAR BUTTONS -->
                            <div class="profile-userbuttons">
                                <button type="button" class="btn btn-success btn-sm shadow-sm" onclick="abriModalAdicionar()">Adicionar</button>
                                <button type="button" class="btn btn-primary btn-sm shadow-sm" data-toggle="modal" data-target="#removerVideoModal">Funções</button>
                            </div>
                            <!-- END SIDEBAR BUTTONS -->
                            <!-- SIDEBAR MENU -->
                            <div class="profile-usermenu">
                                <ul id="ul">
                                    <li class="nav-item active" >
                                        <a href="{{ url('/geral') }}">
                                        <i class="fa fa-home fa-2x" aria-hidden="true"></i>
                                        Visão geral </a>
                                    </li>
                                    <br>
                                    <li class="nav-item" >
                                        <a href="{{ url('/ranking') }}">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        Ranking</a>
                                    </li>
                                    <br>
                                    <li class="nav-item">
                                        <a href="{{ url('/configuracao') }}">
                                        <i class="fa fa-cogs" aria-hidden="true"></i>		
                                        Configurações </a>
                                    </li>
                                    <br>
                                    <li class="nav-item">
                                        <a href="{{ url('/conquistas') }}">
                                        <i class="fa fa-th-list" aria-hidden="true"></i>
                                        Conquistas </a>
                                    </li>
                                    <br>
                                    <li class="nav-item">
                                        <a href="{{ url('/ajuda') }}">
                                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                                        Ajuda </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- END MENU -->
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="profile-content shadow-sm">
                            @yield('content')   
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Modal adicionar video --}}
            <div class="modal fade" id="adicionarVideoModal" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><strong>Adicionar Video</strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="nomeVideo" class="col-lg-3 col-form-label text-md-right">{{ __('Nome do Video') }}</label>
                                
                                <div class="col-md-8">
                                    <input id="nomeVideo" type="text" class="form-control" name="nomeVideo" minlength="4" maxlength="30" size="25" required placeholder="Informe nome do Video">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="canal" class="col-lg-3 col-form-label text-md-right">{{ __('Video youtube') }}</label>
                                
                                <div class="col-md-8">
                                    <input id="canal" type="text" class="form-control" name="canal" required placeholder="Adicione seu Link aqui">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="verifica" class="col-lg-3 col-form-label text-md-right">{{ __('Verifica Video') }}</label>
                                
                                <div id="btn" class="col-md-8 one">
                                    <button type="button" class="btn btn-primary btn-block buttonVerifica" onclick="verifica()" id="verificaVideo">VERIFICAR VIDEO</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="fechaModalAdicionar()">Fechar</button>
                            <button id="adiciona" type="button" class="btn btn-primary" onclick="salva()">Adicionar</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal remover video --}}
            <div class="modal fade" id="removerVideoModal" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><strong>Desabilitar Video</strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
            @if(count($dados) > 0)
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>VIDEOS</th>
                                        <th>STATUS</th>
                                        <th>VISUALIZADO</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                @foreach ($dados as $item)
                                    <tr>
                                        <td style="display: none;">{{ $item->id }}</td>
                                        <td>{{ strtoupper($item->nameVideo) }}</td>
                    @if($item->active == 1)
                                        <td>ATIVADO</td>
                    @else
                                        <td>DESATIVADO</td>
                    @endif
                                        <td>{{ $item->viewVideo }}</td>
                                        <td>
                    @if($item->active == 0)
                                            <button class="btn btn-danger btn-sm" onclick="ativaVideo({{ $item->id }}, {{ $dados }})" data-toggle="tooltip" data-placement="right" title="Ativar">
                                                <a style="color: white;" href="javascript:;"><i class="fa fa-power-off" aria-hidden="true"></i></a>
                                            </button>
                    @else
                                            <button class="btn btn-success btn-sm" onclick="desativaVideo({{ $item->id }}, {{ $dados }})" data-toggle="tooltip" data-placement="right" title="Desativar">
                                                <a style="color: white;" href="javascript:;"><i class="fa fa-power-off" aria-hidden="true"></i></a>
                                            </button>
                    @endif
                                        </td>
                                    </tr>
                @endforeach
                                </tbody>          
                            </table>
            @else
                                        <div>{{ strtoupper(Auth::user()->name) }} - Você ainda não adicionou nenhum video<i class="fa fa-frown-o fa-2x" style="position:absolute; right: 10%; color: red;" aria-hidden="true"></i></div>  
                                        <br><p>Se você adicionou algum video. Por favor atualize a Pàgina</p>               
            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
    @else
            @yield('content') 
    @endif
        </main>
        <div class="push"></div>
    </div>
    <!-- Footer -->
    <footer  class="fixed page-footer footer">
        <hr>
        <!-- Footer Elements -->
        <div class="container">

            <!-- Social buttons -->
            <ul class="list-unstyled list-inline text-center">
                <li class="list-inline-item">
                    <a class="btn-floating btn-fb mx-1" href="#">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-tw mx-1" href="#">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-gplus mx-1" href="#">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-gplus mx-1" href="#">
                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-gplus mx-1" href="#">
                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                    </a>
                </li>
                
            </ul>
            <!-- Social buttons -->

        </div>
        <!-- Footer Elements -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://mdbootstrap.com/education/bootstrap/" style="color: #1f2f3f"> TrocaViews.com</a>
        </div>
    <!-- Copyright -->
    </footer>

</body>

</html>
