// active sidebar
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