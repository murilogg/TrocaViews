@extends('layouts.app')


@section('content')

@push('components') 
    <script type="text/javascript" src="{{ asset('js/help/help.js') }}"></script>

    <link href="{{ asset('css/help/help.css') }}" rel="stylesheet">
@endpush

<div class="title card-title">
    <h5 class="border-bottom border-gray pb-2"><strong>Ajuda</strong>
        <a class="btn btn-primary btn-sm pull-right shadow-sm" role="button" href="/venda">Tirar duvida</a>
    </h5>
</div>
<div class="my-3 p-3 bg-white conquestScroll style-1">
    @for ($i = 0; $i < 10; $i++)
        <div class="col-md-12">
            <div class="panel panel-primary shadow-sm">
                <div class="panel-heading clickable">
                    <div class="titlePanel">
                        <strong class="d-block text-gray-dark">Regras texto grande para teste em celular pequeno</strong>
                    </div>
                    <span class="btn btn-primary btn-md paddingButton pull-right shadow-sm">
                        <i class="fa fa-arrow-right fa-lg" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="panel-body">
                    Panel content <a href="http://www.jquery2dotnet.com/2014/01/static-social-button-with-animation.html">Static Social Button With Animation</a>
                </div>
            </div>
        </div>
    @endfor
</div>


@endsection