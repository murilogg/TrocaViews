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

//document.getElementById("video").onclick = contador();
//var myVideo = document.querySelector("#video")

function mostraVideo() {
    var media = 0
    var tag = "http://www.youtube.com/embed/"

    $.get('/api/obter', function(data) {
        let t = JSON.parse(data);
        let m = JSON.parse(data);
        for (var i = 0; i <= t.length; i++) {
            media += window.matchMedia(t[i].vistoPorVideo)
            console.log("media for", media)
        }
        console.log("media depois do for", media)

        for (var x = 0; x <= m.length; x++) {

            if (m[x].vistoPorVideo == 0) {

                tag + m[x].codigoVideo
                document.getElementById("player").src = tag
            } else if (m[x].vistoPorVideo < media) {

                tag + m[x].codigoVideo
                document.getElementById("player").src = tag
                media += m[x].vistoPorVideo
            }
        }


        console.log("json.parse: ", t)
    })
}


//var videoId = document.getElementsByTagName('src');
//firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// var player;

// function onYouTubeIframeAPIReady(objeto) {
//     player = new YT.Player('player', {
//         videoId: objeto,
//         events: {
//             'onReady': onPlayerReady,
//             'onStateChange': onPlayerStateChange
//         }
//     });
// }

// function onPlayerReady(event) {
//     event.target.playVideo();
// }