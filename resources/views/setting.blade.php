@extends('layouts.app')


@section('content')

@push('components') 
    <link href="{{ asset('css/setting/setting.css') }}" rel="stylesheet">
@endpush

<div class="card-deck paddingCard">
@for ($i = 0; $i < 4; $i++)   
        <div class="col-md-3 borderCol">
    @if($i == 0)
            <div class="card border-info mx-sm-1 p-3 borderRadiusCard">
                <div class="card border-info shadow text-info p-3 borderRadius">
                    <i class="fa fa-eye fa-lg" aria-hidden="true"></i>
                </div>
                <div class="card-title text-info text-center mt-3"><h4>Visualizo</h4></div>
                <div class="text-info text-center mt-2"><h1>234</h1></div>
            </div>
    @elseif($i == 1)
            <div class="card border-success mx-sm-1 p-3 borderRadiusCard">
                <div class="card border-success shadow text-success p-3 borderRadius">
                    <i class="fa fa-star-o fa-lg" aria-hidden="true"></i>
                </div>
                <div class="card-title text-success text-center mt-3"><h4>Rank</h4></div>
                <div class="text-success text-center mt-2"><h1>100</h1></div>
            </div>
    @elseif($i == 2)
            <div class="card border-danger mx-sm-1 p-3 borderRadiusCard">
                <div class="card border-danger shadow text-danger p-3 borderRadius">
                    <i class="fa fa-clock-o fa-lg" aria-hidden="true"></i>
                </div>
                <div class="card-title text-danger text-center mt-3"><h4>Tempo</h4></div>
                <div class="text-danger text-center mt-2"><h1>31Hr</h1></div>
            </div>
    @else
            <div class="card border-warning mx-sm-1 p-3 borderRadiusCard">
                <div class="card border-warning shadow text-warning p-3 borderRadius">
                    <i class="fa fa-youtube fa-lg" aria-hidden="true"></i>
                </div>
                <div class="card-title text-warning text-center mt-3"><h4>Visualização</h4></div>
                <div class="text-warning text-center mt-2"><h1>234</h1></div>
            </div>
    @endif                          
        </div>
@endfor
</div>
<div class="form-group">
    <label>Adicione uma Foto</label>
    <input type="file" name="photo" class="form-control">
</div>
@csrf
<button class="btn btn-primary btn-sm"><a href="/foto"></a></button>
<img src="{{ $user->name }}" class="img-responsive" alt=""> 

@endsection