let input3 = document.getElementById('input3');
input3.addEventListener("change", function () {
    let input3_q = document.querySelector('#input3');
    var input3_bild = input3_q.options[input3_q.selectedIndex].getAttribute('data-bild');
    var input3_w = input3_q.options[input3_q.selectedIndex].getAttribute('data-bild-w');
    var input3_h = input3_q.options[input3_q.selectedIndex].getAttribute('data-bild-h');
    let bild = document.getElementById('image');
    if (input3_bild == "") {
        var input3_bild = "../images/error.jpg";
        var input3_w = "734";
        var input3_h = "864";
    }
    bild.setAttribute('src', input3_bild)
    bild.setAttribute('data-image-width', input3_w)
    bild.setAttribute('data-image-height', input3_h)
});