// mensagens alerts
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