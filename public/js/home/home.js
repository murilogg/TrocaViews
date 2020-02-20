window.onload = function() {
    sidebarActive()
    userLogado()
    mostraVideo()
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
        $('#userLogado').modal('show');

        setTimeout(function() {
            $('#userLogado').modal('hide');
        }, 3000); // 3000 = 3 segundos
    }
}

//document.getElementById("video").onclick = contador();
//var myVideo = document.querySelector("#video")

function mostraVideo() {
    $.get('/api/obter', function(data) {
        let t = JSON.parse(data);
        for (var i = 0; i <= t.length; i++) {

        }
        var tag = "http://www.youtube.com/embed/" + t[0].codigoVideo
        document.getElementById("player").src = tag
        console.log("json.parse: ", t)
    })
}


var videoId = document.getElementsByTagName('src');
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// var player;

// function onYouTubeIframeAPIReady() {
//     player = new YT.Player('player', {
//         height: '400',
//         width: '700',
//         videoId: '2mM3xjxzns4',
//         events: {
//             'onReady': onPlayerReady,
//             'onStateChange': onPlayerStateChange
//         }
//     });
// }

// function onPlayerReady(event) {
//     event.target.playVideo();
// }

// var done = false;

// function onPlayerStateChange(event) {
//     if (event.data == YT.PlayerState.PLAYING && !done) {
//         setTimeout(stopVideo, 6000);
//         done = true;
//     }
// }

// function stopVideo() {
//     player.stopVideo();
// }