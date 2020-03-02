var ehVideo
var button = 0
var playerVerifica, playingV = false;

function isYoutubeVideo(url) {
    var v = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
    return (url.match(v)) ? RegExp.$1 : false;
}

function verifica() {
    var nome = $('#nomeVideo').val()
    var video = $('#canal').val()

    if (!button) {
        button = document.getElementById("verificaVideo")
    }

    if (nome.length < 4) {
        mensagens("center", "Insira o nome do Video", "Minimo 4, Maximo 30", "warning", true, false, "")
    } else {
        ehVideo = isYoutubeVideo(video);
        var codvideo = ehVideo

        // Mensagem alert
        if (!codvideo) {
            campoVazio()
            mensagens("center", "Oops...", "Video não encontrado!", "error", true, false, "<a href>Você está fazendo certo?</a>")

        } else {
            document.getElementById("adiciona").disabled = false
            playerVerifica = new YT.Player('verificaVideo', {
                height: "200",
                width: "100%",
                videoId: ehVideo,
                playerVars: { 'autoplay': 1, 'controls': 0 },
                events: {
                    'onReady': onPlayerVReady,
                    'onStateChange': onPlayerVStateChange
                }
            })
        }
    }
}

function salva() {
    var nome = $('#nomeVideo').val()

    video = {
        video: ehVideo,
        nome: nome
    }

    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    $.post('/api/addVideo', video, function(data) {

        if (data == 1) {
            fechaModalAdicionar()
            var text = "Código do vídeo: " + ehVideo
            mensagens("top-end", "Video adicionado com Sucesso", text, "success", false, 1800, false)

        } else if (data == 0) {
            document.getElementById("adiciona").disabled = true
            mensagens("center", "Atenção..!", "Este video já está cadastrado !", "warning", true, false, "<p>O sistema não aceita videos iguais</p>")

        } else {
            document.getElementById("adiciona").disabled = true
            mensagens("center", "Atenção..!", "Só é permitido adicionar 2 videos !", "warning", true, false, "<a href>Assine premium, e adicione mais Videos</a>")
        }
        console.log(data)
        campoVazio()
        removeButton()
    })
}

function onPlayerVReady(event) {
    event.target.playVideo();
    var temp = playerVerifica.getDuration()
    if (temp < 60) {
        campoVazio()
        removeButton()
        mensagens("center", "Video curto..!", "Só é permitido videos acima de 1 minuto !", "error", true, false, "<a href>Você está fazendo certo?</a>")
    }
}

function onPlayerVStateChange(event) {

    if (event.data == YT.PlayerState.PLAYING) {
        playingV = true;
    } else if (event.data == YT.PlayerState.PAUSED) {
        playingV = false;
    }
}

function removeButton() {
    var node = document.getElementById("verificaVideo")
    if (node.parentNode) {
        node.parentNode.removeChild(node);
        var div = document.getElementById("btn")
        div.appendChild(button)
    }
}

function campoVazio() {
    $('#nomeVideo').val('')
    $('#canal').val('')
}

function abriModalAdicionar() {
    campoVazio()
    document.getElementById("adiciona").disabled = true
    $('#adicionarVideoModal').modal('show')
}

function fechaModalAdicionar() {
    campoVazio()
    document.getElementById("adiciona").disabled = true
    $('#adicionarVideoModal').modal('hide')
}