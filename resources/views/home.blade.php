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
            <button type="button" class="btn btn-success btn-sm buttonHome" onclick="abriModalComment()" data-toggle="tooltip" data-placement="right" title="VIDEO">
                PRÓXIMO
            </button>
        </div>
    </div>
</div>

{{-- Modal Comentario --}}
<div class="modal fade" id="comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nova mensagem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Destinatário:</label>
            <input type="text" class="form-control" id="recipient-name" value="{{ $user->name }}" disabled>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Mensagem:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Avalie:</label>
    @for ($i = 1; $i <= 5; $i++)
            <button class="btn btn-outline-warning btn-sm border-dark" value="{{ $i }}">
                <i class="fa fa-star" style="color: black;" aria-hidden="true"></i>
            </button>
    @endfor
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary buttonHome" data-dismiss="modal" onclick="fechaModalComment()">Fechar</button>
        <button type="button" class="btn btn-primary buttonHome" onclick="submitComment()">Enviar</button>
      </div>
    </div>
  </div>
</div>

@endsection


