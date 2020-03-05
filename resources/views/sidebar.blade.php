@extends('layouts.app')


@section('content')

<div style="display: none;" id="userId">{{ $user->id }}</div>  
<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar shadow-sm">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    @if ($user)
                        <div class="form-group">
                            <label>Adicione uma Foto</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        @csrf
                        <button class="btn btn-primary btn-sm"><a href="/foto"></a></button>
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
                @include('home') 
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

@endsection