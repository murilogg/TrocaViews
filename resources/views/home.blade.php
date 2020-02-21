@extends('layouts.app')


@section('content')


@push('components')
    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/home/verificaVideo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/home/home.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- Scripts Sidebar -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- Link Sidebar -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" id="bootstrap-css">

    <!-- Styles sidebar-->
    <link href="{{ asset('css/home/home.css') }}" rel="stylesheet">
@endpush

{{-- <div style="display: none;" id="userId">{{ $user->id }}</div>  --}}
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
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#adicionarVideoModal">Adicionar</button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#removerVideoModal">Remover</button>
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
                {{-- <iframe id="player" width="100%"  style="height: 400px;" src="https://www.youtube.com/embed/2mM3xjxzns4" frameborder="0" allowfullscreen></iframe> --}}
                <iframe id="player" type="text/html" width="100%" height="400px" src="" frameborder="0"></iframe>
                {{-- <div id="player"></div> --}}
                <div id="number"></div>
            </div>
        </div>
    </div>
</div>


{{-- Modal user logado --}}
<div class="modal fade" id="userLogado">
    <div class="modal-dialog modal-lg">
        <div class="col-md-12">
            <div class="card border-primary">
                {{-- <div class="card-header title m-b-md">{{ strtoupper($user->name) }} - Você está logado!</div> --}}

                <div class="card-body">
                    @if (!session('status'))
                        <div class="alert alert-primary title m-b-md" role="alert">
                            Olá seja Bem-vindo ao Troca de Views
                        </div>
                    @endif       
                </div>
            </div>
        </div>
    </div>
</div>
  
{{-- Modal adicionar video --}}
<div class="modal fade" id="adicionarVideoModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="canal" class="col-lg-3 col-form-label text-md-right">{{ __('Video youtube') }}</label>
                
                    <div class="col-md-8">
                        <input id="canal" type="text" class="form-control" name="canal" required placeholder="Adicione seu Video">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" onclick="verifica()">Confirmar</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal remover video --}}
<div class="modal fade" id="removerVideoModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-ordered table-hover">
                    <thead>
                        <tr>
                            <th>Videos</th>
                        </tr>
                    </thead>
                    <tbody>
    @foreach ($dados as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                        </tr>
    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" onclick="verifica()">Confirmar</button>
            </div>
        </div>
    </div>
</div>

@endsection


