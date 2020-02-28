var ehVideo
var button
var playerVerifica, playingV = false;

function isYoutubeVideo(url) {
    var v = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
    return (url.match(v)) ? RegExp.$1 : false;
}

function verifica() {
    button = document.getElementById("verificaVideo")
    var video = $('#canal').val();

    ehVideo = isYoutubeVideo(video);
    var codvideo = ehVideo

    var nome = $('#nomeVideo').val()
    if(document.getElementById("nomeVideo").value.length < 4){
        mensagens("center", "Insira o nome do Video", "Minimo 4, Maximo 30", "warning", true, false, "")
        document.getElementById("nomeVideo").focus();
    }

    // Mensagem alert
    if (!codvideo) {
        $('#nomeVideo').val('')
        $('#canal').val('')
        $('#verificaVideo').val('')
        document.getElementById("nomeVideo").focus();
        mensagens(false, "Oops...", "Video não encontrado!", "error", true, false, "<a href>Você está fazendo certo?</a>")

    } else {
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

function salva(){
    var nome = $('#nomeVideo').val()
    if(document.getElementById("nomeVideo").value.length < 4){
        mensagens("center", "Insira o nome do Video", "Minimo 4, Maximo 30", "warning", true, false, "")
        document.getElementById("nomeVideo").focus();
    }
    verifica()

    video = {
        video: ehVideo,
        nome: nome
    }

    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    $.post('/api/addVideo', video, function(data) {

        if (data == 1) {
            $('#adicionarVideoModal').modal('hide')
            $('#nomeVideo').val('')
            $('#canal').val('')
            removeButton()
            var text = "Código do vídeo: " + codvideo
            mensagens("top-end", "Video adicionado com Sucesso", text, "success", false, 1800, false)
            
        } else if (data == 0) {
            $('#nomeVideo').val('')
            $('#canal').val('')
            removeButton()
            mensagens(false, "Atenção..!", "Este video já está cadastrado !", "warning", true, false, "<p>O sistema não aceita videos iguais</p>")

        } else {
            $('#nomeVideo').val('')
            $('#canal').val('')
            removeButton()
            mensagens(false, "Atenção..!", "Só é permitido adicionar 2 videos !", "warning", true, false, "<a href>Assine premium, e adicione mais Videos</a>")
        }
        console.log(data)
    })
}

function onPlayerVReady(event) {
    event.target.playVideo();
    var temp = playerVerifica.getDuration()
    if(temp < 60){
        $('#nomeVideo').val('')
        $('#canal').val('')
        removeButton()
        mensagens(false, "Video curto..!", "Só é permitido videos acima de 1 minuto !", "error", true, false, "<a href>Você está fazendo certo?</a>")
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