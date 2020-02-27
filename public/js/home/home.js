window.onload = function() {
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

// function mostraVideo() {
//     var media = 0
//         //var tag = "http://www.youtube.com/embed/"
//     var codigo = 0

//     $.get('/api/obter', function(data) {
//         let t = JSON.parse(data);
//         let m = JSON.parse(data);

//         for (var i = 0; i < t.length; i++) {

//             if (t[i].vistoVideo > 0) {
//                 media += window.matchMedia(t[i].vistoVideo)
//                 console.log("media for", media)
//             }
//         }
//         console.log("media depois do for", media)

//         for (var x = 0; x < m.length; x++) {

//             if (m[x].vistoVideo == 0 && m[x].contador == 0) {

//                 codigo = m[x].videoId
//                 onYouTubeIframeAPIReady(codigo)
//                     //document.getElementById("player").src = codigo
//             } else if (m[x].vistoVideo < media) {

//                 codigo = m[x].videoId
//                 document.getElementById("player").src = tag + codigo
//                 media += m[x].vistoVideo
//             }
//         }

//         console.log("json.parse: ", t)
//     })
// }

var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player, playing = false;

function onYouTubeIframeAPIReady() {
    var codigo = 0
    var media = 0
    var cont = 0
    var mediaMenor = 0
    var contMenor = 0
    $.get('/api/obter', function(data) {

        let t = JSON.parse(data);
        for (var i = 0; i < t.length; i++) {
            if (t[i].vistoVideo > 0) {
                media += t[i].vistoVideo
                cont++
            }
        }
        media = media / cont

        for (var i = 0; i < t.length; i++) {
            if (t[i].vistoVideo > 0 && t[i].vistoVideo < media) {
                mediaMenor += t[i].vistoVideo
                contMenor++
            }
        }
        mediaMenor = mediaMenor / contMenor

        for (var x = 0; x < t.length; x++) {
            if (t[x].vistoVideo == 0 && t[x].contador == 0) {
                console.log("reproduzindo este 0: ", t[x].vistoVideo)
                codigo = t[x].videoId
                break
            } else if (t[x].vistoVideo == x) {
                console.log("reproduzindo este x : ", t[x].vistoVideo)
                codigo = t[x].videoId
                break
            } else if ([x].vistoVideo < mediaMenor) {
                console.log("reproduzindo este <Menor: ", t[x].vistoVideo)
                codigo = t[x].videoId
                break
            } else if (t[x].vistoVideo < media) {
                console.log("reproduzindo este <: ", t[x].vistoVideo, media, mediaMenor)
                codigo = t[x].videoId
                break
            } else {
                console.log("reproduzindo este else: ", t[x].vistoVideo, media, mediaMenor)
                codigo = t[x].videoId
            }
        }

        player = new YT.Player('player', {
            height: "400",
            width: "100%",
            videoId: codigo,
            playerVars: { 'autoplay': 1, 'controls': 0 },
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        })
    })
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
    var n = 0
    var v = 0
    var l = document.getElementById("number");
    window.setInterval(function() {
        v = player.getCurrentTime()
        l.innerHTML = "Credito: " + parseFloat(v.toFixed(0))
        n++;
    }, 1000);

    var data = new Date();
    var min = data.getMinutes();
}