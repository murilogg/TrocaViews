@extends('layouts.app')

@section('content')

{{-- @push('components')
    
@endpush --}}

<div id="player"></div>
{{-- <iframe id="player" type="text/html" width="100%" height="400px" src="" frameborder="0"></iframe> --}}
{{-- <iframe id="player" type="text/html" width="640" height="360" src="http://www.youtube.com/embed/M7lc1UVf-VE?enablejsapi=1&origin=http://example.com" frameborder="0"></iframe> --}}
<div class="card-body">
    <div class="row">
        <div class="col-10 text-left">
            <div id="number"></div>
        </div>
        <div class="col-2 text-right">
            <button type="button" class="btn btn-success btn-sm" style="text-align: right; font-size: 14px;" onclick="proximo()" data-toggle="tooltip" data-placement="right" title="VIDEO">
                PRÓXIMO
            </button>
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
                    
                    <div id="btn" class="col-md-8 one">
                        <button type="button" class="btn btn-primary btn-block" onclick="verifica()" id="verificaVideo">Verificar Video</button>
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
                            <td style="display: none;">{{ $item->id }}</td>
                            <td>{{ strtoupper($item->nomeVideo) }}</td>
        @if($item->ativo == 1)
                            <td>ATIVADO</td>
        @else
                            <td>DESATIVADO</td>
        @endif
                            <td>{{ $item->vistoVideo }}</td>
                            <td>
        @if($item->ativo == 0)
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


