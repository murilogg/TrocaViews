function abriModalComment() {
    $('#comment').modal('show')
}

function fechaModalComment() {
    $('#comment').modal('hide')
}

function submitComment() {
    var msg = $('#message-text').val()

    comment = {
        idVideo: idVideoAtual,
        ranking: rank,
        comment: msg
    }

    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    $.post('/api/comment', comment)

}