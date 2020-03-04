@extends('layouts.app')

@section('content')

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

@endsection


