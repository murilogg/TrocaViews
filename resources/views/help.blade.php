@extends('layouts.app')


@section('content')

@push('components') 
    <script type="text/javascript" src="{{ asset('js/help/help.js') }}"></script>

    <link href="{{ asset('css/help/help.css') }}" rel="stylesheet">
@endpush

<div class="title card-title">
    <h5 class="border-bottom border-gray pb-2"><strong>Ajuda</strong></h5>
</div>
{{-- <div class="my-3 p-3 bg-white conquestScroll">
@for ($i = 0; $i < 5; $i++)
    <div class="review-block">
        <div class="media text-muted">
            </div> 
            <div class="panel panel-primary">
                <div class="panel-heading clickable">
                    <div class="title card-title">
                        <strong class="d-block text-gray-dark">Regras {{ $i }}</strong>
                    </div>
                        <button class="btn btn-primary btn-md paddingButton" style="pull-right;">
                            <i class="fa fa-arrow-right fa-lg" aria-hidden="true"></i>
                        </button>
                </div>
                <div class="panel-body">
                    Panel content <a href="http://www.jquery2dotnet.com/2014/01/static-social-button-with-animation.html">Static Social Button With Animation</a></div>
            </div>
        </div>
    </div>
@endfor
</div>
<div class="card-footer border-while">
    <a class="btn btn-primary btn-sm" role="button" href="/venda">Nova pergunta</a>
</div> --}}

<div class="my-3 p-3 bg-white conquestScroll">
    @for ($i = 0; $i < 10; $i++)
        <div class="col-md-12">
            <div class="panel panel-primary shadow-sm">
                <div class="panel-heading clickable">
                    <div class="title">
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