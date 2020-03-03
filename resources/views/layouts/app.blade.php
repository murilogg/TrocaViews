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
            <div style="display: none;" id="userId">{{ $user->id }}</div>  
            <div class="container">
                <div class="row profile">
                    <div class="col-md-3">
                        <div class="profile-sidebar">
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
                                <button type="button" class="btn btn-success btn-sm" onclick="abriModalAdicionar()">Adicionar</button>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#removerVideoModal">Funções</button>
                            </div>
                            <!-- END SIDEBAR BUTTONS -->
                            <!-- SIDEBAR MENU -->
                            <div class="profile-usermenu">
                                <ul id="ul">
                                    <li class="nav-item active" >
                                        <a href="{{ url('/troca') }}">
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
                                        <a href="#">
                                        <i class="fa fa-cogs" aria-hidden="true"></i>		
                                        Configurações </a>
                                    </li>
                                    <br>
                                    <li class="nav-item">
                                        <a href="#">
                                        <i class="fa fa-th-list" aria-hidden="true"></i>
                                        Tarefas </a>
                                    </li>
                                    <br>
                                    <li class="nav-item">
                                        <a href="#">
                                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                                        Ajuda </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- END MENU -->
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="profile-content">
                            @yield('content')                
                        </div>
                    </div>
                </div>
            </div>
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
