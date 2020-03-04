window.onload = function() {
    sidebarActive()
    userLogado()
    $('[data-toggle="tooltip"]').tooltip()
    document.getElementById("adiciona").disabled = true;
}

let t
var idVideoAtual

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
        mensagens("center", "Seja Bem-Vindo!", "Você está logado!", "success", false, 2500, false)
            // setTimeout(function() {
            //     $('#userLogado').modal('hide');
            // }, 3000); // 3000 = 3 segundos
    }
}

function mensagens(position, title, text, icon, button, timer, footer) {
    Swal.fire({
        position: position,
        title: title,
        text: text,
        icon: icon,
        showConfirmButton: button,
        timer: timer,
        footer: footer
    })
}

function proximo() {
    var start = "https://www.youtube.com/embed/"
    var finish = "?autoplay=1&controls=0&enablejsapi=1&origin=http%3A%2F%2Flocalhost%3A8000&widgetid=1"
    var code = 0
    var average = 0
    var cont = 0
    var averageSmaller = 0
    var contSmaller = 0
    var smaller = 0

    console.log(t)
    console.log(idVideoAtual)

    for (var i = 0; i < t.length; i++) {
        if (t[i].id == idVideoAtual) {
            t[i].viewVideo += 1
        }
        if (t[i].viewVideo > 0) {
            average += t[i].viewVideo
            cont++
        }
    }
    average = average / cont

    for (var i = 0; i < t.length; i++) {
        if (t[i].viewVideo > 0 && t[i].viewVideo < average) {
            averageSmaller += t[i].viewVideo
            contSmaller++
        }
    }
    averageSmaller = averageSmaller / contSmaller
    smaller = average - averageSmaller

    for (var x = 0; x < t.length; x++) {
        if (t[x].viewVideo == 0 && t[x].counterHr == 0) {
            code = t[x].videoId
            start += code + finish
            idVideoAtual = t[x].id
            document.getElementById("player").src = start
            break
        } else if ([x].viewVideo < smaller) {
            code = t[x].videoId
            start += code + finish
            idVideoAtual = t[x].id
            document.getElementById("player").src = start
            break
        } else if ([x].viewVideo < averageSmaller) {
            code = t[x].videoId
            start += code + finish
            idVideoAtual = t[x].id
            document.getElementById("player").src = start
            break
        } else if (t[x].viewVideo < average) {
            code = t[x].videoId
            start += code + finish
            idVideoAtual = t[x].id
            document.getElementById("player").src = start
            break
        } else {
            code = t[x].videoId
            start += code + finish
            idVideoAtual = t[x].id
            document.getElementById("player").src = start
        }
    }

    console.log("json.parse: ", t)
}

var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player, playing = false;

function onYouTubeIframeAPIReady() {
    var code = 0
    var average = 0
    var cont = 0
    var averageSmaller = 0
    var contSmaller = 0
    var smaller = 0
    $.get('/api/obter', function(data) {

        t = JSON.parse(data);
        for (var i = 0; i < t.length; i++) {
            if (t[i].viewVideo > 0) {
                average += t[i].viewVideo
                cont++
            }
        }
        average = average / cont

        for (var i = 0; i < t.length; i++) {
            if (t[i].viewVideo > 0 && t[i].viewVideo < average) {
                averageSmaller += t[i].viewVideo
                contSmaller++
            }
        }
        averageSmaller = averageSmaller / contSmaller
        smaller = average - averageSmaller

        for (var x = 0; x < t.length; x++) {
            if (t[x].viewVideo == 0 && t[x].counterHr == 0) {
                code = t[x].videoId
                idVideoAtual = t[x].id
                break
            } else if ([x].viewVideo < averageSmaller) {
                code = t[x].videoId
                idVideoAtual = t[x].id
                break
            } else if (t[x].viewVideo < average) {
                code = t[x].videoId
                idVideoAtual = t[x].id
                break
            } else {
                code = t[x].videoId
                idVideoAtual = t[x].id
            }
        }

        player = new YT.Player('player', {
            height: "400",
            width: "100%",
            videoId: code,
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
        contadorTempo()
    } else if (event.data == YT.PlayerState.PAUSED) {
        playing = false;
    }
}

function contadorTempo() {
    var n = 0
    var v = 0
    var l = document.getElementById("number");
    window.setInterval(function() {
        v = player.getCurrentTime()
        l.innerHTML = "Tempo: " + parseFloat(v.toFixed(0))
        n++;
    }, 1000);

    var data = new Date();
    var min = data.getMinutes();
}