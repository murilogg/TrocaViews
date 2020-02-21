function isYoutubeVideo(url) {
    var v = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
    return (url.match(v)) ? RegExp.$1 : false;
}

function verifica() {
    var video = $('#canal').val();

    var ehVideo = isYoutubeVideo(video);
    var codvideo = ehVideo

    // Mensagem alert
    if (!codvideo) {
        $('#canal').val('');
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Video não encontrado!',
            footer: '<a href>Você está fazendo certo?</a>'
        })

    } else {
        video = {
            video: ehVideo
        }
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.post('/api/addVideo', video, function(data) {

            if (data == 1) {
                $('#adicionarVideoModal').modal('hide')
                $('#canal').val('');
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Video adicionado com Sucesso',
                    text: 'Código do vídeo: ' + codvideo,
                    showConfirmButton: false,
                    timer: 1800
                })
            } else if (data == 0) {
                $('#canal').val('');
                Swal.fire({
                    icon: 'warning',
                    title: 'Atenção !',
                    text: 'Este video já está cadastrado !',
                    footer: '<p>O sistema não aceita videos iguais</p>'
                })

            } else {
                $('#canal').val('');
                Swal.fire({
                    icon: 'warning',
                    title: 'Atenção !',
                    text: 'Só é permitido adicionar 2 videos !',
                    footer: '<a href>Assine premium, e adicione mais Videos</a>'
                })
            }
            console.log(data)
        })
    }
}