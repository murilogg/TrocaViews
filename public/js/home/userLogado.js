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