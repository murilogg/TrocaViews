@extends('layouts.app')


@section('content')

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
                    <i class="fa fa-star fa-2x" aria-hidden="true"></i>
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

@endsection