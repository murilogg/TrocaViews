function ativaVideo(id, dados) {
    var rAtivo = ativo(dados)
    var rTempo = tempo(id, dados)

    if (rTempo <= 24) {
        var text = 'Este video já foi alterado, Há ' + rTempo + 'Hrs'
        mensagens('center', 'Atenção prazo de 24Hr', text, 'info', true, false, '<a href>Assine premium, e altere seus videos quando quiser</a>')
    } else if (rAtivo >= 2) {
        mensagens('center', 'Atenção..!', 'Só é permitido ativar 2 videos', 'info', true, false, '<a href>Assine premium, e ative mais Videos</a>')
    } else {
        Swal.fire({
            title: 'Ativar Video?',
            text: 'Você pode reverter essa modificação mais tarde!',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, ativar!',
            footer: 'Prazo de 24hr para reverter está alteração'
        }).then((result) => {
            if (result.value) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                })
                Toast.fire({
                    icon: 'success',
                    title: 'Ativado com sucesso !'
                })
                window.location.href = '/api/ativaDesativa/' + id
            }
        })
    }
}

function desativaVideo(id, dados) {
    var rTempo = tempo(id, dados)

    if (rTempo <= 24) {
        var text = 'Este video já foi alterado, Há ' + rTempo + 'Hrs'
        mensagens('center', 'Atenção prazo de 24Hr', text, 'info', true, false, '<a href>Assine premium, e altere seus videos quando quiser</a>')
    } else {
        Swal.fire({
            title: 'Desativar Video?',
            text: 'Você pode reverter essa modificação mais tarde!',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, desativar!',
            footer: 'Prazo de 24hr para reverter está alteração'
        }).then((result) => {
            if (result.value) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                })
                Toast.fire({
                    icon: 'success',
                    title: 'Desativado com sucesso !'
                })
                window.location.href = '/api/ativaDesativa/' + id
            }
        })
    }
}

function ativo(dados) {
    var ativo = 0;
    for (var i = 0; i < dados.length; i++) {
        if (dados[i].ativo > 0) {
            ativo++
        }
    }

    return ativo
}

function tempo(id, dados) {
    var dt1, dt2

    for (var i = 0; i < dados.length; i++) {
        if (dados[i].id == id) {
            var dt1 = new Date(dados[i].dataServidor)
            var dt2 = new Date(dados[i].contadorDia)
            break
        }
    }
    var df = Math.abs(dt1 - dt2)
    var hora = 1000 * 60 * 60 * 1;
    var total = Math.round(df / hora)

    return total
}