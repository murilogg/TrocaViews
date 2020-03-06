var nota = 0

function avalia(val) {
    nota = val
    var node = document.getElementById("btnStyle")
    var item

    for (let i = 0; i < val; i++) {
        item = node.getElementsByTagName('button')[i]
        item.classList.remove("btn-outline-warning")
        item.className += " btn-warning"
    }

    for (let i = 4; i >= val; i--) {
        item = node.getElementsByTagName('button')[i]
        item.classList.remove('btn-warning')
        item.className += ' btn-outline-warning'
    }
}

function submitComment() {
    if (nota == 0) {
        mensagens("center", "Por favor avalie", "Quantas estrelas este video merece", "warning", true, false, "Sua avaliação é muito importante")
    }

    var msg = $('#message-text').val()

    comment = {
        idVideo: idVideoAtual,
        ranking: rank,
        comment: msg
    }

    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    $.post('/api/comment', comment)

}

function abriModalComment() {
    $('#comment').modal('show')
}

function fechaModalComment() {
    $('#comment').modal('hide')
}