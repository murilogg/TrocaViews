function ativarVideo(id){
    Swal.fire({
        title: 'Ativar Video?',
        text: 'Você pode reverter essa modificação mais tarde!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, ativar!'
    }).then((result) => {
        if(result.value){
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
            window.location.href = '/ativaDesativa/' + id
        }
    })
}

function desativaVideo(id){
    Swal.fire({
        title: 'Desativar Video?',
        text: 'Você pode reverter essa modificação mais tarde!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, desativar!'
    }).then((result) => {
        if(result.value){
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
            window.location.href = '/ativaDesativa/' + id
        }
    })
}