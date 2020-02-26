window.onload = function() {
    mostraVideo()
    sidebarActive()
    userLogado()
    $('[data-toggle="tooltip"]').tooltip()
}

function sidebarActive() {
    var div = document.getElementById("ul")
    var lb = div.getElementsByClassName("nav-item")
    for (var i = 0; i < lb.length; i++) {
        lb[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active")
            current[0].className = current[0].className.replace(" active", "")
            this.className += " active"
        })
    }
}

// Modal Bem-vindo
function userLogado() {
    var logado = $('#userId').text();
    if (logado != 0) {
        Swal.fire({
                title: 'Seja Bem-Vindo! ',
                text: 'Você está logado!',
                icon: 'success',
                showConfirmButton: false,
                timer: 2500
            })
            // setTimeout(function() {
            //     $('#userLogado').modal('hide');
            // }, 3000); // 3000 = 3 segundos
    }
}

function mostraVideo() {
    var media = 0
        //var tag = "http://www.youtube.com/embed/"
    var codigo = 0

    $.get('/api/obter', function(data) {
        let t = JSON.parse(data);
        let m = JSON.parse(data);

        for (var i = 0; i < t.length; i++) {

            if (t[i].vistoVideo > 0) {
                media += window.matchMedia(t[i].vistoVideo)
                console.log("media for", media)
            }
        }
        console.log("media depois do for", media)

        for (var x = 0; x < m.length; x++) {

            if (m[x].vistoVideo == 0 && m[x].contador == 1) {

                codigo = m[x].codigoVideo
                    //document.getElementById("player").src = codigo
            } else if (m[x].vistoVideo < media) {

                codigo = m[x].codigoVideo
                document.getElementById("player").src = tag + codigo
                media += m[x].vistoVideo
            }
        }

        console.log("json.parse: ", t)
    })
}

var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player, playing = false;

function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: "400",
        width: "100%",
        videoId: "RWeFOe2Cs4k",
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
}

function onPlayerReady(event) {
    event.target.playVideo();
}

function stopVideo() {
    player.stopVideo();
}

function onPlayerStateChange(event) {

    if (event.data == YT.PlayerState.PLAYING) {
        playing = true;
        contador()
    } else if (event.data == YT.PlayerState.PAUSED) {
        playing = false;
    }
}

function contador() {
    var n = 0;
    var l = document.getElementById("number");
    window.setInterval(function() {
        l.innerHTML = player.getCurrentTime("%.2f")
        n++;
    }, 1000);

    var data = new Date();
    var min = data.getMinutes();
}