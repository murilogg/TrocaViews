@extends('layouts.app')


@section('content')


@push('components')
    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/home/verificaVideo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/home/funcaoVideo.js') }}"></script>
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
                <div id="player"></div>
                {{-- <iframe id="player" type="text/html" width="100%" height="400px" src="" frameborder="0"></iframe> --}}
                {{-- <iframe id="player" type="text/html" width="640" height="360" src="http://www.youtube.com/embed/M7lc1UVf-VE?enablejsapi=1&origin=http://example.com" frameborder="0"></iframe> --}}
                <div class="card-body">
                    <div class="row">
                        <div class="col-10 text-left">
                            <div id="number"></div>
                        </div>
                        <div class="col-2 text-right">
                            <button type="button" class="btn btn-success btn-sm" style="text-align: right;" onclick="proximo()" data-toggle="tooltip" data-placement="right" title="VIDEO">
                                PRÓXIMO
                            </button>
                        </div>
                    </div>
                </div>
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
                    
                    <div id="btn" class="col-md-8">
                        <button type="button" class="btn btn-primary" onclick="verifica()" id="verificaVideo">Verificar Video</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Desabilitar Video</h5>
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
                            <td>{{ strtoupper($item->nomeVideo) }}</td>
        @if($item->ativo == 1)
                            <td>ATIVADO</td>
        @else
                            <td>DESATIVADO</td>
        @endif
                            <td>{{ $item->vistoVideo }}</td>
                            <td>
        @if($item->ativo == 0)
                                <button class="btn btn-success btn-sm" onclick="ativarVideo({{ $item->id }})" data-toggle="tooltip" data-placement="right" title="Ativar">
                                    <a style="color: white;" href="javascript:;"><i class="fa fa-power-off" aria-hidden="true"></i></a>
                                </button>
        @else
                                <button class="btn btn-danger btn-sm" onclick="desativaVideo({{ $item->id }})" data-toggle="tooltip" data-placement="right" title="Desativar">
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

@endsection


