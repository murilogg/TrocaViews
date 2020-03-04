@extends('layouts.app')


@section('content')
    <link href="{{ asset('css/conquest/conquest.css') }}" rel="stylesheet">
@push('components') 
    
@endpush

<div class="title card-title">
    <h5 class="border-bottom border-gray pb-2"><strong>Conquistas</strong></h5>
</div>
<div class="my-3 p-3 bg-white rounded conquestScroll">
@for ($i = 0; $i < 5; $i++)
    <div class="media text-muted pt-3">
        <div class="padding">
            <button class="btn btn-primary btn-md paddingButton">
                <i class="fa fa-calendar-check-o fa-2x" aria-hidden="true"></i>
            </button>
        </div>
        <p class="media-body pb-3 mb-0 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Missão {{ $i }}</strong>
            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
        </p>
    </div>
@endfor
    <small class="d-block text-right mt-3">
        <a href="#">All updates</a>
    </small>
</div>

@endsection