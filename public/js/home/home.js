window.onload = function() {
    sidebarActive()
    userLogado()
    $('[data-toggle="tooltip"]').tooltip()
    document.getElementById("adiciona").disabled = true;
}

let t
var idVideoAtual
var nomeUserAtual

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
            nomeUserAtual = t[x].name.split(' ')[0];
            var text = "Ajude " + nomeUserAtual + " a evoluir, comente aonde ele pode melhorar"
            document.getElementById("player").src = start
            document.getElementsByTagName("placeholder") = text
            break
        } else if ([x].viewVideo < smaller) {
            code = t[x].videoId
            start += code + finish
            idVideoAtual = t[x].id
            nomeUserAtual = t[x].name.split(' ')[0];
            var text = "Ajude " + nomeUserAtual + " a evoluir, comente aonde ele pode melhorar"
            document.getElementById("player").src = start
            document.getElementsByTagName("placeholder") = text
            break
        } else if ([x].viewVideo < averageSmaller) {
            code = t[x].videoId
            start += code + finish
            idVideoAtual = t[x].id
            nomeUserAtual = t[x].name.split(' ')[0];
            var text = "Ajude " + nomeUserAtual + " a evoluir, comente aonde ele pode melhorar"
            document.getElementById("player").src = start
            document.getElementsByTagName("placeholder") = text
            break
        } else if (t[x].viewVideo < average) {
            code = t[x].videoId
            start += code + finish
            idVideoAtual = t[x].id
            nomeUserAtual = t[x].name.split(' ')[0];
            var text = "Ajude " + nomeUserAtual + " a evoluir, comente aonde ele pode melhorar"
            document.getElementById("player").src = start
            document.getElementsByTagName("placeholder") = text
            break
        } else {
            code = t[x].videoId
            start += code + finish
            idVideoAtual = t[x].id
            nomeUserAtual = t[x].name.split(' ')[0];
            var text = "Ajude " + nomeUserAtual + " a evoluir, comente aonde ele pode melhorar"
            document.getElementById("player").src = start
            document.getElementsByTagName("placeholder") = text
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